{{--
	/**
	 * The template for displaying all pages
	 *
	 * This is the template that displays all pages by default.
	 * Please note that this is the WordPress construct of pages
	 * and that other 'pages' on your WordPress site may use a
	 * different template.
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
	 *
	 * @package Theme_Name
	 */
--}}

@extends('layouts.master')
@section('content')
	<p>page.php</p>
	
	@include('includes.page-content-from-admin')
@endsection

