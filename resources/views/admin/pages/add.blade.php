@extends('layouts.admin')

@section('content')
<div class="container">
    Añadir publicación
    <textarea id="editorjs"></textarea>

    <!-- Create the editor container -->
<div id="editor">
  <p>Hello World!</p>
</div>



<!-- Initialize Quill editor -->
<script>
  var editor = new Quill('#editor', {
    modules: { toolbar: '#toolbar' },
    theme: 'snow'
  });
</script>

</div>
@endsection
