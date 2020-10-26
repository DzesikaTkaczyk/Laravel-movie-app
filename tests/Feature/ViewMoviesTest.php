<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ViewMoviesTest extends TestCase
{
    public function the_main_page_shows_correct_info()
    {
        $response = $this->get(route('movies.index'));

        $response->assertSuccessful(200);
        $response->assertSee('Popular Movies');
    }
}

public function the_search_dropdown_works() {
    Http::fake([
        'https://api.themoviedb.org/3/search/movie?query=jumanji' => this->fakeSearchMovies(),
    ]);

    livewire::test('search-dropdown')
        -> assertDontSee('jumanji')
        ->set('search', 'jumanji')
        ->assertSee('Jumanji');
}
