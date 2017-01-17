<?php

    namespace App\Http\Controllers;

    use App\Http\Requests\storePostRequest;
    use Auth;
    use App\User;
    use App\Post;
    use Carbon\Carbon;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\App;

    /**
     * Class PostController
     * @package App\Http\Controllers
     */
    class PostController extends Controller
    {

        public function __construct()
        {
            $this->middleware( "auth", [ 'except' => [ 'index', 'show' ] ] );
        }

        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
            $posts = Post::orderBy('created_at', 'desc')->simplePaginate(10);
            return view( 'posts', compact( 'posts' ) );
            //
        }

        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        {
            $user = Auth::user();
            return view( 'editor', compact( 'user' ) );
        }

        /**
         * Store a newly created resource in storage.
         *
         * @param  Request $request
         * @return \Illuminate\Http\Response
         */
        public function store( Request $request )
        {
        	$this->validate( $request,[
        		'title' => 'required|max:255',
        		'body' => 'required'
	        ]);
            $post = new Post;
            $post->title = $request->input( 'title' );
            $post->body = $request->input( 'body' );
            $post->created_by = Auth::user()->name;
            $post->published_at = Carbon::now( "EST" );
	        $post->save();

	        if($request->input('quick_post')) {
		        return redirect('/home');
	        }

            return redirect( '/posts' );
        }

        /**
         * Display the specified resource.
         *
         * @param  int $id
         * @return \Illuminate\Http\Response
         */
        public function show( $id )
        {
        	if(Auth::check()) {
		        $user = Auth::user();
	        }
            $post = Post::find( $id );

            return view( 'post', compact('user',  'post' ) );
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param  int $id
         * @return \Illuminate\Http\Response
         */
        public function edit( $id )
        {

            $post = Post::find( $id );
	        $user = Auth::user();

	        if($user->name !==  $post->created_by ){
	        	return back();
	        }

            return view( 'updater', compact( 'post', 'user'));
        }

        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request $request
//       * @param  int $id
         * @return \Illuminate\Http\Response
         */
        public function update( Request $request, $id )
        {
        	$post = Post::find($id);
        	$post->title = $request->title;
        	$post->body = $request->body;
            $post->save();
            return redirect("/posts");
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param  int $id
         * @return \Illuminate\Http\Response
         */
        public function destroy( $id )
        {
            Post::destroy( $id);
        	return redirect('/home');
        }
    }
