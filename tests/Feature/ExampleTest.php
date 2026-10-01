<?php

namespace Tests\Feature;

use Tests\TestCase;

class ExampleTest extends TestCase
{
    public function test_the_home_page_uses_the_portfolio_profile_and_artwork(): void
    {
        $this->get('/')
            ->assertOk()
            ->assertSee('Tristan')
            ->assertSee('Artist')
            ->assertSee('images/tristan-cutout.png')
            ->assertSee('class="hero-wordmark-title">TRISTAN</h1>', false)
            ->assertDontSee('Independent creative')
            ->assertDontSee('>TJ<span', false)
            ->assertDontSee('hero-masthead-note')
            ->assertSee('images/tj-logo.svg')
            ->assertSee('class="brand-mark"', false)
            ->assertSee('Audiowide', false)
            ->assertSee('role="switch"', false)
            ->assertSee('aria-checked="false"', false)
            ->assertSee('I am an experienced self-taught artist and web designer. I create visually engaging, user-friendly work that invites people to look closer.');
    }

    public function test_the_about_page_contains_the_lab_exercise_biography(): void
    {
        $this->get('/about')
            ->assertOk()
            ->assertSee('San Pablo City')
            ->assertSee('IbisPaint')
            ->assertSee('Laguna State Polytechnic University');
    }

    public function test_the_gallery_includes_all_104_original_portfolio_images(): void
    {
        $this->get('/gallery')
            ->assertOk()
            ->assertSee('104 pieces')
            ->assertDontSee('Search the collection')
            ->assertSee('images/traditional/art-01.jpg')
            ->assertSee('images/digital/digital-01.jpg')
            ->assertSee('images/outfits/outfit-01.jpg')
            ->assertSee('images/outfits/outfit-17.jpg')
            ->assertSee('dialog');
    }

    public function test_the_gallery_category_filter_only_shows_matching_artwork(): void
    {
        $this->get('/gallery?category=digital-art')
            ->assertOk()
            ->assertSee('24 pieces')
            ->assertSee('images/digital/digital-01.jpg')
            ->assertDontSee('images/traditional/art-01.jpg')
            ->assertDontSee('images/outfits/outfit-01.jpg');
    }

    public function test_the_outfits_category_includes_all_17_photos(): void
    {
        $this->get('/gallery?category=outfits')
            ->assertOk()
            ->assertSee('17 pieces')
            ->assertSee('images/outfits/outfit-17.jpg')
            ->assertDontSee('images/outfits/outfit-18.jpg');
    }

    public function test_the_gallery_search_matches_category_and_piece_number(): void
    {
        $this->get('/gallery?q=03')
            ->assertOk()
            ->assertSee('art-03.jpg')
            ->assertSee('digital-03.jpg')
            ->assertSee('outfit-03.jpg')
            ->assertDontSee('art-04.jpg');
    }

    public function test_invalid_gallery_categories_are_rejected(): void
    {
        $this->get('/gallery?category=unknown')
            ->assertRedirect()
            ->assertSessionHasErrors('category');
    }

    public function test_an_artwork_detail_uses_the_dynamic_slug(): void
    {
        $this->get('/gallery/traditional-art-01')
            ->assertOk()
            ->assertSee('Traditional artwork 01')
            ->assertSee('art-01.jpg')
            ->assertSee('Traditional artwork 02');
    }

    public function test_an_unknown_artwork_slug_returns_a_404(): void
    {
        $this->get('/gallery/does-not-exist')->assertNotFound();
    }

    public function test_the_contact_page_includes_the_original_contact_information(): void
    {
        $this->get('/contact')
            ->assertOk()
            ->assertSee('tristanjamestorres9@gmail.com')
            ->assertSee('+63-995-064-4602')
            ->assertSee('name="phone"', false);
    }

    public function test_the_contact_form_validates_and_confirms_a_message(): void
    {
        $this->post('/contact', [
            'name' => 'Test Sender',
            'email' => 'sender@example.com',
            'phone' => '+63 900 000 0000',
            'message' => 'I would like to ask about a creative collaboration.',
        ])
            ->assertRedirect(route('contact'))
            ->assertSessionHas('sent', true)
            ->assertSessionHas('sentName', 'Test Sender');
    }

    public function test_the_contact_form_requires_a_name_email_and_message(): void
    {
        $this->from('/contact')
            ->post('/contact', ['phone' => '123'])
            ->assertRedirect('/contact')
            ->assertSessionHasErrors(['name', 'email', 'message']);
    }
}
