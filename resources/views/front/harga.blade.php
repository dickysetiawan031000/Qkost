@extends('front.layouts.main')

@section('container')
<div class="container">
    <div class="row justify-content-center mt-5">
        <main>
            <div class="row">
                <div class="card col-lg-4 ">
                    <div class=" card-head">
                        <h4 class="text-center p-3">2 Petak</h4>
                        <hr>
                    </div>
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the
                            card's
                            content.</p>
                    </div>
                    <div class="card-footer">
                        <h4 class="text-center">footer</h4>
                    </div>
                </div>

                <div class="card col-lg-4">
                    <div class=" card-head">
                        <h4 class="text-center p-3">2 Petak</h4>
                        <hr>
                    </div>
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the
                            card's
                            content.</p>
                    </div>
                    <div class="card-footer">
                        <h4 class="text-center">footer</h4>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
@endsection

<style>
    .card {
        padding: 10px
    }
</style>