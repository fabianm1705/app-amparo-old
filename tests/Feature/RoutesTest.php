<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use App\Models\Specialty;

class RoutesTest extends TestCase
{
     use RefreshDatabase;

     public function test_route_welcome()
     {
         $response = $this->get('/');
         $response->assertStatus(200);
     }

     public function test_route_about()
     {
         $response = $this->get('/about');
         $response->assertStatus(200);
     }

     public function test_route_home()
     {
         $user = new User;
         $response = $this->actingAs($user)->get(route('home'));
         $response->assertStatus(200);
     }

     public function test_redirect_guest_to_login()
     {
         $response = $this->get(route('home'))
                          ->assertStatus(302)
                          ->assertRedirect('login');
     }

     public function test_specialties_index_forbbiden()
     {
         $user = new User;
         $response = $this->actingAs($user)
                          ->get(route('specialties.index'))
                          ->assertStatus(403);
     }

     public function test_doctors_index_forbbiden()
     {
         $user = new User;
         $response = $this->actingAs($user)
                          ->get(route('doctors.index'))
                          ->assertStatus(403);
     }

     public function test_products_index_forbbiden()
     {
         $user = new User;
         $response = $this->actingAs($user)
                          ->get(route('products.index'))
                          ->assertStatus(403);
     }

     public function test_orders_index_forbbiden()
     {
         $user = new User;
         $response = $this->actingAs($user)
                          ->get(route('orders.index'))
                          ->assertStatus(403);
     }

     public function test_categories_index_forbbiden()
     {
         $user = new User;
         $response = $this->actingAs($user)
                          ->get(route('categories.index'))
                          ->assertStatus(403);
     }

     public function test_roles_index_forbbiden()
     {
         $user = new User;
         $response = $this->actingAs($user)
                          ->get(route('roles.index'))
                          ->assertStatus(403);
     }

     public function test_users_index_forbbiden()
     {
         $user = new User;
         $response = $this->actingAs($user)
                          ->get(route('users.index'))
                          ->assertStatus(403);
     }

     public function test_specialties_edit_forbbiden()
     {
         $user = User::first();
         $specialty = Specialty::first();
         $response = $this->actingAs($user)
                          ->get(route('specialties.edit',['specialty' => $specialty]))
                          ->assertStatus(403);
     }
}
