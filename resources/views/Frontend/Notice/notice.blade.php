@extends('Frontend.master')

@section('title')
    Notice
@endsection
@section('content')
    <main>
        <!-- Banner section Start -->
        @php($notices = \App\Models\Notice::where('status',1)->orderBy('id','desc')->paginate(15))
        @php($notices_count = \App\Models\Notice::count())
        <section class="notice section_padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-12">
                        <div
                            class="row d-flex align-items-center justify-content-center"
                        >
                            <div class="col-lg-8 col-sm-12">
                                <div class="section_title">
                                    <div
                                        class="d-flex align-items-center justify-content-center pb-3"
                                    >
                                        <h2 class="me-2">Notice</h2>
                                        <h3>Board</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="div-2">
                            @foreach($notices as $notice)

                            <div class="notice shadow p-2  mt-3">
                                <p>
                                   {{ $notice->title }}
                                </p>
                                <div
                                    class="date d-flex justify-content-between align-items-center"
                                >
                                    <a href="#"
                                    ><i class="fas fa-calendar-alt me-2"></i>{{ \Carbon\Carbon::parse($notice->created_at)->format('d-m-Y') }} </a
                                    >
                                    <a class="btn download_btn" href="{{route('frontend.notice.download',['id'=>$notice->id])}}">Download</a>
                                </div>
                            </div>

                            @endforeach
                         {{--    <div class="notice shadow p-2 mt-2">
                                <p>
                                    Pending Document Verification for Graduate Programs –
                                    Spring 2022
                                </p>
                                <div
                                    class="date d-flex justify-content-between align-items-center"
                                >
                                    <a href="#"
                                    ><i class="fas fa-calendar-alt me-2"></i>21/08/2022</a
                                    >
                                    <a class="btn download_btn" href="#">Download</a>
                                </div>
                            </div>
                            <div class="notice shadow p-2 mt-2">
                                <p>
                                    Pending Document Verification for Graduate Programs –
                                    Spring 2022
                                </p>
                                <div
                                    class="date d-flex justify-content-between align-items-center"
                                >
                                    <a href="#"
                                    ><i class="fas fa-calendar-alt me-2"></i>21/08/2022</a
                                    >
                                    <a class="btn download_btn" href="#">Download</a>
                                </div>
                            </div>
                            <div class="notice shadow p-2 mt-2">
                                <p>
                                    Pending Document Verification for Graduate Programs –
                                    Spring 2022
                                </p>
                                <div
                                    class="date d-flex justify-content-between align-items-center"
                                >
                                    <a href="#"
                                    ><i class="fas fa-calendar-alt me-2"></i>21/08/2022</a
                                    >
                                    <a class="btn download_btn" href="#">Download</a>
                                </div>
                            </div> --}}
                          @if($notices_count > 15)
                            <div class="button-primary mt-3 text-left">
                                <a href="" class="btn"> More </a>
                            </div>
                          @endif

                        {{--   {{ $notices->onEachSide(2)->links() }} --}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
