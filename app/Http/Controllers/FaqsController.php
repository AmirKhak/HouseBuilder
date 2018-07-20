<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Faq;

class FaqsController extends Controller
{
    //
    public function index()
    {
      $is_current_user_admin = $this->isCurrentUserAdmin();
      $faqs = Faq::all();
      return view('faqs.index')->with('faqs', $faqs)->with('is_current_user_admin', $is_current_user_admin);
    }

    public function store(Request $request) {
      if ($this->isCurrentUserAdmin()) {
        $this->validate($request, [
          'question' => 'required',
          'answer' => 'required'
        ]);

        $faq = new Faq;
        $faq->question = $request->input('question');
        $faq->answer = $request->input('answer');
        $faq->save();

        return redirect('/faq')->with('success', 'Your question has been added!');
      }
    }

    public function destroy($id) {
      if ($this->isCurrentUserAdmin()) {
        $faq = Faq::find($id);
        $faq->delete();
        return redirect('/faq')->with('success', 'Your question has been removed!');
      }
    }

}
