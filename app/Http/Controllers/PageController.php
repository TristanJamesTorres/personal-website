<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class PageController extends Controller
{
    private function profile(): array
    {
        return [
            'name' => 'Tristan James C. Torres',
            'displayName' => 'Tristan James Torres',
            'firstName' => 'Tristan',
            'initials' => 'TJ',
            'role' => 'Self-taught artist & web designer',
            'location' => 'San Pablo City, Laguna, Philippines',
            'school' => 'Laguna State Polytechnic University — San Pablo City Campus',
            'tagline' => 'I am an experienced self-taught artist and web designer. I create visually engaging, user-friendly work that invites people to look closer.',
            'email' => 'tristanjamestorres9@gmail.com',
            'phone' => '+63-995-064-4602',
            'heroImage' => 'images/intro.jpg',
            'portrait' => 'images/profile.jpg',
            'logo' => 'images/tj-logo.svg',
            'socials' => [
                ['name' => 'Facebook', 'url' => 'https://www.facebook.com/tristan.james.568', 'icon' => 'fa-facebook-f'],
                ['name' => 'Instagram', 'url' => 'https://www.instagram.com/tristanjamestorres/', 'icon' => 'fa-instagram'],
                ['name' => 'LinkedIn', 'url' => 'https://www.linkedin.com/in/tristan-james-c-torres-0b9b1b1b3/', 'icon' => 'fa-linkedin-in'],
                ['name' => 'GitHub', 'url' => 'https://github.com/', 'icon' => 'fa-github'],
            ],
        ];
    }

    private function galleryCategories(): array
    {
        return [
            'traditional-art' => [
                'label' => 'Traditional art',
                'description' => 'Sketchbook studies, drawings, and traditional pieces.',
                'count' => 63,
                'directory' => 'traditional',
                'prefix' => 'art',
                'altLabel' => 'Traditional artwork',
                'icon' => 'fa-pencil',
            ],
            'digital-art' => [
                'label' => 'Digital art',
                'description' => 'Illustrations created with digital tools.',
                'count' => 24,
                'directory' => 'digital',
                'prefix' => 'digital',
                'altLabel' => 'Digital artwork',
                'icon' => 'fa-tablet-screen-button',
            ],
            'outfits' => [
                'label' => 'Outfits',
                'description' => 'Personal style, outfit photographs, and fashion inspiration.',
                'count' => 17,
                'directory' => 'outfits',
                'prefix' => 'outfit',
                'altLabel' => 'Personal outfit photograph',
                'icon' => 'fa-shirt',
            ],
        ];
    }

    private function galleryItems(): array
    {
        $items = [];

        foreach ($this->galleryCategories() as $key => $category) {
            for ($number = 1; $number <= $category['count']; $number++) {
                $formattedNumber = str_pad((string) $number, 2, '0', STR_PAD_LEFT);

                $items[] = [
                    'slug' => $key . '-' . $formattedNumber,
                    'category' => $key,
                    'categoryLabel' => $category['label'],
                    'number' => $formattedNumber,
                    'title' => $category['altLabel'] . ' ' . $formattedNumber,
                    'alt' => $category['altLabel'] . ' ' . $formattedNumber . ' by Tristan James C. Torres',
                    'image' => 'images/' . $category['directory'] . '/' . $category['prefix'] . '-' . $formattedNumber . '.jpg',
                ];
            }
        }

        return $items;
    }

    public function home(): View
    {
        $profile = $this->profile();
        $items = $this->galleryItems();

        return view('home', [
            'profile' => $profile,
            'siteName' => $profile['name'],
            'siteTagline' => $profile['role'],
            'categories' => $this->galleryCategories(),
            'featuredArtworks' => [
                $items[0],
                $items[1],
                $items[63],
                $items[64],
                $items[87],
                $items[88],
            ],
        ]);
    }

    public function about(): View
    {
        $profile = $this->profile();

        return view('about', [
            'profile' => $profile,
            'siteName' => $profile['name'],
            'bio' => [
                'paragraphs' => [
                    'I am a passionate artist from San Pablo City, Laguna. I started taking art seriously in junior high school, exploring different techniques, styles, and mediums that helped shape my creativity and artistic identity. Over time, my interest grew beyond traditional drawing and painting into digital art, where I can combine creativity with technology.',
                    'I am currently pursuing a Bachelor’s degree in Information Technology at Laguna State Polytechnic University — San Pablo City Campus. My interests include traditional and digital art, fashion, thrifting, and technology. I express ideas through traditional mediums and digital platforms such as IbisPaint and Adobe Photoshop. I also have working knowledge of Java, C#, HTML, and CSS.',
                    'My aspiration is to become a solid contributor to the tech industry while maintaining my creativity through art. I aim to bring innovation and artistic expression together, showing how technology and creativity can work hand in hand to build meaningful solutions.',
                ],
            ],
            'interests' => [
                ['label' => 'Traditional art', 'icon' => 'fa-pencil'],
                ['label' => 'Digital illustration', 'icon' => 'fa-tablet-screen-button'],
                ['label' => 'Fashion & thrifting', 'icon' => 'fa-shirt'],
                ['label' => 'Technology', 'icon' => 'fa-code'],
            ],
            'tools' => ['IbisPaint', 'Adobe Photoshop', 'Java', 'C#', 'HTML', 'CSS'],
        ]);
    }

    public function gallery(Request $request): View
    {
        $categories = $this->galleryCategories();
        $filters = $request->validate([
            'category' => ['nullable', 'string', Rule::in(array_keys($categories))],
            'q' => ['nullable', 'string', 'max:80'],
        ]);
        $activeCategory = $filters['category'] ?? null;
        $search = trim($filters['q'] ?? '');
        $artworks = array_values(array_filter($this->galleryItems(), function (array $artwork) use ($activeCategory, $search) {
            $matchesCategory = $activeCategory === null || $artwork['category'] === $activeCategory;
            $matchesSearch = $search === ''
                || stripos($artwork['title'], $search) !== false
                || stripos($artwork['categoryLabel'], $search) !== false
                || stripos($artwork['number'], $search) !== false;

            return $matchesCategory && $matchesSearch;
        }));

        return view('gallery', [
            'siteName' => $this->profile()['name'],
            'categories' => $categories,
            'activeCategory' => $activeCategory,
            'search' => $search,
            'artworks' => $artworks,
        ]);
    }

    public function galleryShow(string $slug): View
    {
        $profile = $this->profile();
        $artworks = $this->galleryItems();
        $index = array_search($slug, array_column($artworks, 'slug'), true);

        abort_if($index === false, 404);

        $artwork = $artworks[$index];
        $categoryItems = array_values(array_filter(
            $artworks,
            fn (array $item) => $item['category'] === $artwork['category']
        ));
        $categoryIndex = array_search($slug, array_column($categoryItems, 'slug'), true);
        $category = $this->galleryCategories()[$artwork['category']];

        return view('gallery-show', [
            'siteName' => $profile['name'],
            'artwork' => $artwork,
            'category' => $category,
            'previous' => $categoryItems[($categoryIndex - 1 + count($categoryItems)) % count($categoryItems)],
            'next' => $categoryItems[($categoryIndex + 1) % count($categoryItems)],
        ]);
    }

    public function contact(): View
    {
        $profile = $this->profile();

        return view('contact', [
            'siteName' => $profile['name'],
            'profile' => $profile,
        ]);
    }

    public function sendContact(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:150'],
            'phone' => ['nullable', 'string', 'max:40'],
            'message' => ['required', 'string', 'max:2000'],
        ]);

        return redirect()
            ->route('contact')
            ->with('sent', true)
            ->with('sentName', $validated['name']);
    }
}
