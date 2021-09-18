<x-app-layout>
    <x-slot name="header">Walmart Order Details</x-slot>


{{$orderdetail->order_date}}



    <div class="row">
      <div class="col-sm-8">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Order Summary</h5>
            <div class="row">
            <div class="col-sm-6">

              <div class="row">
                <div class="col">
                      <p class="card-text">{{$orderdetail->order_date}}</p>
                      <p class="card-text">Paid Date</p>
                      <p class="card-text">Ship By</p>
                      <p class="card-text">Holid Until</p>
                </div>
                <div class="col">
                      <p class="card-text">Cost</p>
                      <p class="card-text">Product</p>
                      <p class="card-text">Shipping</p>
                      <p class="card-text">Tax</p>
                      <p class="card-text">Total</p>
                      <p class="card-text">Total Paid</p>
                </div>
              </div>
            </div>
            <div class="col">shipping_info
              {{$orderdetail->shipping_info}}
              <p class="card-text">Recipient</p>
              <p class="card-text">Ship To</p>
              <p class="card-text">Adress Validated</p>
              <p class="card-text">Tax Information</p>
              <p class="card-text">Solid To</p>
            </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-sm-4">
        <div class="card">
          <div class="card-body">
            <form>
                  <div class="form-group row mt-2 ">
                      <label for="text" class=" col-sm"> Ship From : </label>
                      <div class="col-sm-8">
                        <input type="text" readonly class="form-control-plaintext form-control-sm" id="" value="Your Global Garage">
                      </div>
                  </div>
                  <div class="form-group row mt-2 ">
                      <label for="text" class=" col-sm">Request  </label>
                      <div class="col-sm-8">
                        <input type="text" readonly class="form-control-plaintext form-control-sm" id="" value="Value">
                      </div>
                  </div>

                  <div class="form-group row mt-2">
                      <label for="text" class=" col-sm">Weight </label>
                      <div class="col-sm-2">
                        <input type="text"  class="form-control form-control-sm" id="" value="0">
                      </div>
                      <label for="text" class=" col-sm">(lb) </label>
                      <div class="col-sm-2">
                        <input type="text"  class="form-control form-control-sm" id="" value="0">
                      </div>
                      <label for="text" class=" col-sm">(oz) </label>
                      <div class="col-sm-2">
                        <input type="text"  class="form-control form-control-sm" id="" value="0">
                      </div>
                  </div>

                  <div class="form-group row mt-2">
                      <label for="text" class=" col-sm">Size </label>
                      <div class="col-sm-2">
                        <input type="text"  class="form-control form-control-sm" id="" value="0">
                      </div>
                      <label for="text" class=" col-sm">L </label>
                      <div class="col-sm-2">
                        <input type="text"  class="form-control form-control-sm" id="" value="0">
                      </div>
                      <label for="text" class=" col-sm">W </label>
                      <div class="col-sm-2">
                        <input type="text"  class="form-control form-control-sm" id="" value="0">
                      </div>
                      <label for="text" class=" col-sm">H (in) </label>
                  </div>

                  <div class="form-group row mt-2 ">
                      <label for="text" class="col-sm">Service</label>
                      <div class="col-sm-8">
                        <select class="form-control form-control-sm">
                        <option>USPS First Class Mail</option>
                        <option>Small select</option>
                        <option>Small select</option>
                        </select>
                      </div>
                  </div>
                  <div class="form-group row mt-2">
                      <label for="text" class="col-sm ">Package</label>
                      <div class="col-sm-8">
                        <select class="form-control form-control-sm">
                        <option>Package</option>
                        <option>Small select</option>
                        <option>Small select</option>
                      </div>
                  </div>

                  <div class="form-group row mt-2">
                      <label for="text" class="col-sm ">Insurance</label>
                      <div class="col-sm-8">
                        <select class="form-control form-control-sm">
                        <option>None</option>
                        <option>Small select</option>
                        <option>Small select</option>
                      </div>
                  </div>

                  <BR>
                  <button type="submit" class="btn btn-primary">Send Request</button>
              </form>



      </div>


    </div>
    </div>
    </div>




</x-app-layout>
