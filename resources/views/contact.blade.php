@extends('apabila')
@section('nama')
    <!--contact-->

    <section id="contact">
      <div class="container">
        <div class="row text-center">
          <div class="col">
            <h2><br>Contact me</h2>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-8">
            <form>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" />
              </div>
              <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">input message</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
      </div>

      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path
          fill="rgb(252, 253, 206)"
          fill-opacity="1"
          d="M0,32L26.7,48C53.3,64,107,96,160,128C213.3,160,267,192,320,186.7C373.3,181,427,139,480,106.7C533.3,75,587,53,640,64C693.3,75,747,117,800,117.3C853.3,117,907,75,960,80C1013.3,85,1067,139,1120,176C1173.3,213,1227,235,1280,229.3C1333.3,224,1387,192,1413,176L1440,160L1440,320L1413.3,320C1386.7,320,1333,320,1280,320C1226.7,320,1173,320,1120,320C1066.7,320,1013,320,960,320C906.7,320,853,320,800,320C746.7,320,693,320,640,320C586.7,320,533,320,480,320C426.7,320,373,320,320,320C266.7,320,213,320,160,320C106.7,320,53,320,27,320L0,320Z"
        ></path>
      </svg>
    </section>
@endsection


