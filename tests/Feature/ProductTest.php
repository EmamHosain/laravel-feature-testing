<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Product;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */

    public function test_the_authenticaed_user_can_create_product(): void
    {
        // custom login authentication system 
        $response = $this->userAuthSet();
        // redirect status 
        $response->assertStatus(302);

        // redirect to another route
        $response->assertRedirect(route('get.products'));

        // create a product
        $response = $this->from(route('add.products'))->post(route('create.product'), [
            'name' => 'test product',
            'price' => 123,
            'description' => 'test description',
        ]);

        // product create or not / product save to database or not
        $this->assertEquals(1, Product::count());


        // after product create redirect status 302 or not
        $response->assertStatus(302);


        // after product create redirect to the route 
        $response->assertRedirect(route('add.products'));


    }



    public function test_the_authenticated_user_can_view_product(): void
    {
        // custom login authentication system 
        $response = $this->userAuthSet();
        // redirect status 
        $response->assertStatus(302);

        // redirect to route products route
        $response->assertRedirect(route('get.products'));

        //auth user can create a product 
        $product = Product::create([
            'name' => 'test product',
            'price' => 123,
            'description' => 'test description',
        ]);


        // check user can product create or not
        $this->assertEquals(1, Product::count());

    }






    public function test_the_authenticated_user_can_update_product(): void
    {
        // custom login authentication system 
        $response = $this->userAuthSet();


        // redirect status 
        $response->assertStatus(302);


        // redirect to route products route
        $response->assertRedirect(route('get.products'));


        //auth user can create a product 
        $response = $this->from(route('add.products'))->post(route('create.product'), [
            'name' => 'test product',
            'price' => 123,
            'description' => 'test description',
        ]);


        // check user can product create or not
        $this->assertEquals(1, Product::count());


        // redirect status 302 
        $response->assertStatus(302);

        //   redirect route products
        $response->assertRedirect(route('add.products'));



        // can auth user update or not 
        $product = Product::first();
        $response = $this->from(route('edit.products', $product->id))->put(route('update.product', $product->id), [
            'name' => 'update product',
            'price' => 456,
            'description' => 'update description',
        ]);


        // product update or not
        $product = Product::first();
        $this->assertEquals('update product', $product->name);
        $this->assertEquals(456, $product->price);
        $this->assertEquals('update description', $product->description);



        // after update product redirect status should be 302
        $response->assertStatus(302);

        // redirect route should be products
        $response->assertRedirect(route('get.products'));


    }



    public function test_the_authenticated_user_can_delete_product(): void
    {
        // custom login authentication system 
        $response = $this->userAuthSet();
        // redirect status 
        $response->assertStatus(302);


        // redirect to route products route
        $response->assertRedirect(route('get.products'));


        //auth user can create a product 
        $response = $this->from(route('add.products'))->post(route('create.product'), [
            'name' => 'test product',
            'price' => 123,
            'description' => 'test description',
        ]);


        // check user can product create or not
        $this->assertEquals(1, Product::count());


        // redirect status 302 
        $response->assertStatus(302);

        //   redirect route products
        $response->assertRedirect(route('add.products'));



        // can auth user update or not 
        $product = Product::first();
        $response = $this->from(route('get.products'))->delete(route('delete.product', $product->id));

        // redirect status should be products route
        $response->assertRedirect(route('get.products'));

        // redirect status should be 302
        $response->assertStatus(302);


        // check delete product from database 
        $this->assertEquals(0, Product::count());


    }



}
