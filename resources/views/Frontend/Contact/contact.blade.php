@extends('Frontend.master')
@section('title')
    Contact
@endsection

@section('content')

 <main>
        <section class="contact section_padding">
          <div class="container">
            <div class="row">
              @if(session('success'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              @endif
              <div class="col-lg-6 col-sm-12">
                <div class="form">
                  <h3 class="mb-4">Leave massage</h3>

                  <form id="contact_form" action="{{ route('frontend.contact-save') }}" method="post">
                    @csrf
                  <div
                    class="d-flex justify-content-between align-items-center"
                  >

                    <div class="mb-3 me-2 w-50">
                      <label for="name" class="form-label"> Name</label>
                      <input
                        type="text"
                        class="form-control"
                        id="Name"
                        name="name"
                        placeholder="John . D"
                      />
                    </div>
                    <div class="mb-3 w-50">
                      <label for="exampleFormControlInput1" class="form-label"
                        > Email</label
                      >
                      <input
                        type="email"
                        class="form-control"
                        id="exampleFormControlInput1"
                        name="email"
                        placeholder="name@example.com"
                      />
                    </div>
                  </div>
                  <div
                    class="d-flex justify-content-between align-items-center"
                  >
                    <div class="mb-3 me-2 w-50">
                      <label for="phone" class="form-label"> Phone</label>
                      <input
                        type="text"
                        class="form-control"
                        id="phone"
                        name="phone"
                        placeholder="01789090909"
                      />
                    </div>
                    <div class="mb-3 w-50">
                      <label for="text" class="form-label"> Subject</label>
                      <input
                        type="text"
                        class="form-control"
                        id="text"
                        name="subject"
                        placeholder="your text"
                      />
                    </div>
                  </div>

                  <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label"
                      >Your Massagess</label
                    >
                    <textarea
                      class="form-control"
                      id="exampleFormControlTextarea1"
                      name="message"
                      rows="3"
                    ></textarea>
                  </div>


                   <div class="mt-5 mb-5 d-flex justify-content-center align-items-center">
                      <input type="submit"  class="btn btn-warning text-uppercase me-4" value="Send Message" />
                  </div>

                </form>

                </div>
              </div>
              <div class="col-lg-6 col-sm-12">

                <div class="mt-5 pt-5 d-flex g-3 align-items-center justify-content-center">
                  <div class="card shadow-sm text-center p-5 me-4">
                    <i class="fas fa-phone-alt"></i>
                    <h6>Contact</h6>
                    <a href="#" class="text-muted"> sakueu@gmail.com </a>
                    <a href="#" class="text-muted">+880 123 456 789</a>
                  </div>
                  <div class="card shadow-sm text-center p-5">
                    <i class="fas fa-phone-alt"></i>
                    <h6>Adress</h6>
                    <a href="#" class="text-muted">
                      1080, street venus Road <br />
                      Dhaka city, Bangladesh.
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

        <!-- Banner section End -->
      </main>

@endsection



@section('js')


  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        if($('#contact_form'). length > 0){
            $('#contact_form').validate({
                rules: {
                    name: {
                        required:true,
                    },phone:{
                        required:true,
                    },email:{
                        required:true,
                    },subject:{
                        required:true,
                    },message:{
                        required:true,
                    }
                },
                messages:{
                    name: {
                        required:"Please enter Your name",
                    },phone:{
                        required:"Please enter your phone number",
                    },email:{
                        required:"please enter your email",
                    },message:{
                        required:"Please enter your message",
                    }
                }
            })
        }


    </script>

@endsection
