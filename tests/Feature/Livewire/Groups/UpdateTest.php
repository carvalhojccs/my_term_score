<?php

use App\Http\Livewire\Groups\Update;
use App\Models\Group;
use App\Models\User;

use function Pest\Laravel\actingAs;
use function Pest\Livewire\livewire;

beforeEach(function() {
    $this->user = User::factory()->createOne();
    actingAs($this->user);

});


// it('should be able to update a group name', function() {
//     //create a group
//     $group = Group::factory()->createOne(['name' => 'Old group name']);

//     livewire(Update::class, compact('group'))
//         ->set('group.name', 'New group name')
//         ->call('save')
//         ->assertHasNoErrors();

//     // expect($group->refresh())
//     //     ->name->toBe('New group name');
// });

// it('should check if the person that is trying to edit trhe group owns the group', function() {
//     $carvalho = User::factory()->createOne();

//     $carvalhoGroup = Group::factory()->create(['user_id' => $carvalho->id, 'name' => 'Carvalho Ggroup']);

//     livewire(Update::class, compact('carvalhoGroup'))
//         ->assertForbidden();
// });

// #region validation
// test('name should be required', function(){
//     $group = Group::factory()->createOne(['name' => 'Old group name']);
    

//     livewire(Update::class, compact('group'))
//         ->set('group.name', '')
//         ->call('save')
//         ->assertHasErrors(['group.name' => 'required']);
// });

// test('name should be a valid string', function(){
//     $group = Group::factory()->createOne(['name' => 'Old group name']);

//     livewire(Update::class, compact('group'))
//         ->set('group.name', 1)
//         ->call('save')
//         ->assertHasErrors(['group.name' => 'string']);
// });

// test('name sould have a min of 3 characters', function(){
//     $group = Group::factory()->createOne(['name' => 'Old group name']);

//     livewire(Update::class, compact('group'))
//         ->set('group.name', 'a')
//         ->call('save')->assertHasErrors(['group.name' => 'min']);
// });

// test('name should have a max 30 characters', function(){
//     $group = Group::factory()->createOne(['name' => 'Old group name']);

//     livewire(Update::class, compact('group'))
//         ->set('group.name', str_repeat('a', 31))
//         ->call('save')->assertHasErrors(['group.name' => 'max']);
// });

// test('name should be unique', function(){
//     Group::factory()->create(['group.name' => 'Test Group']);

//     $group = Group::factory()->createOne(['name' => 'Old Test group']);

//     livewire(Update::class, compact('group'))
//         ->set('group.name', 'Test Group')
//         ->call('save')
//         ->assertHasErrors(['group.name' => 'unique']);
// });

#end region