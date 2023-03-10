<?php

use App\Http\Livewire\Groups\Create;
use App\Models\Group;
use App\Models\User;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertDatabaseCount;
use function Pest\Livewire\livewire;

beforeEach(function() {
    // create a user
    $this->user = User::factory()->create();

    // using the user
    actingAs($this->user);
});

it('should be able to create a new group', function(){
    livewire(Create::class)
        ->set('group.name','Test Group')
        ->call('save')->assertHasNoErrors();

    assertDatabaseCount(Group::class, 1);
});

#region validation
test('name should be required', function(){
    livewire(Create::class)
        ->call('save')
        ->assertHasErrors(['group.name' => 'required']);
});

test('name should be a valid string', function(){
    livewire(Create::class)
        ->set('group.name', 1)
        ->call('save')
        ->assertHasErrors(['group.name' => 'string']);
});

test('name sould have a min of 3 characters', function(){
    livewire(Create::class)
        ->set('group.name', 'a')
        ->call('save')
        ->assertHasErrors(['group.name' => 'min']);
});

test('name should have a max 30 characters', function(){
    livewire(Create::class)
        ->set('group.name', str_repeat('a', 31))
        ->call('save')
        ->assertHasErrors(['group.name' => 'max']);
});

test('name should be unique', function(){
    Group::factory()->create(['group.name' => 'Test Group']);

    livewire(Create::class)->set('group.name', 'Test Group')->call('save')->assertHasErrors(['group.name' => 'unique']);
});

#end region