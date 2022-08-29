@extends('layouts.admin')

@section('title' , 'Contact ')
@section('content')

@if(session('success'))
<div class="alert alert-success">
    <p>{{ session('success') }}</p>
</div>
@endif

 <!-- Main Content-->
 <main class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
<h3>Details : </h3>
                    <form id="contactForm" data-sb-form-api-token="API_TOKEN">
                        <div class="form-floating">
                            <input class="form-control" id="name" type="text" value="{{ $contact->name }}" readonly/>
                            <label for="name">Name</label>
                        </div>
                        <div class="form-floating">
                            <input class="form-control" id="email" type="email" value="{{ $contact->email }}" readonly/>
                            <label for="email">Email address</label>
                        </div>
                        <div class="form-floating">
                            <input class="form-control" id="phone" type="tel" value="{{ $contact->phone }}" readonly/>
                            <label for="phone">Phone Number</label>
                        </div>
                        <div class="form-floating">
                            <textarea class="form-control" id="message" placeholder="Enter your message here..." style="height: 12rem" readonly>{{ $contact->message }} </textarea>
                            <label for="message">Message</label>
                        </div>
                        <br />

                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
