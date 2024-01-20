<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(){
        // Retrieve the list of users from the session or an empty array if not set
        $users = session('users', []);
        return view('task.index', compact('users'));
    }
    public function store(Request $request)
    {
       // dd($request->all());

       // Extract user data from the request
        $user = [
            'name' => $request->input('name'),
             // Store the user's image in the 'images' directory within the 'public' disk
             // Ensure to run this command for proper local storage permissions: php artisan storage:link
            'image' => $request->file('image')->store('images', 'public'),
            'address' => $request->input('address'),
            'gender' => $request->input('gender'),
        ];

        // Retrieve the current users array from the session
        $users = session('users', []);
        //Add to new user
        $users[] = $user;
        //updataing the array
        session(['users' => $users]);
        // Redirect back to the index route
        return redirect()->route('index');
    }
    public function destroy($index)
    {
        //dd($index);
        // Retrieve the current users array from the session
        $users = session('users', []);
        // Remove the user at the specified index
        unset($users[$index]);
        session(['users' => array_values($users)]);
        // Redirect back to the index route
        return redirect()->route('index');
    }
    public function update(Request $request, $index)
    {
        $users = session('users', []);

        $user = [
            'name' => $request->input('name'),
            'address' => $request->input('address'),
            'gender' => $request->input('gender'),
        ];

        // Check if a new image is provided in the request
        if ($request->hasFile('image')) {
            // Store the new image and update the user array
            $user['image'] = $request->file('image')->store('images', 'public');
        } else {
            // If no new image is provided, keep the existing image (if any)
            if (isset($users[$index]['image'])) {
                $user['image'] = $users[$index]['image'];
            }
        }

        // Update the user in the session
        $users[$index] = $user;
        session(['users' => $users]);

        return redirect()->route('index');
    }

}
