<?php

    namespace App\Http\Controllers;

    use App\Http\Requests\storePostRequest;
    use Auth;
    use App\User;
    use App\Post;
    use Carbon\Carbon;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\App;

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
            $posts = Post::all();
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
         * @param  \Illuminate\Http\Request $request
         * @return \Illuminate\Http\Response
         */
        public function store( Request $request )
        {
            $post = new Post;
            $post->title = $request->input( 'title' );
            $post->body = $request->input( 'body' );
            $post->created_by = $request->input( 'created_by' );
            $post->published_at = Carbon::now( "EST" );

            $post->save();
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
	        	return back()->withInput();
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
            //
        }
    }
