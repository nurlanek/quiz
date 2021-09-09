<x-app-layout>
    <x-slot name="header">Walmart Relased Orders</x-slot>
    <div class="card">
        <div class="card-body">
          <h5 class="card-title">
          <a href="#" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i>Dowload New Orders</a></h5>
          <table class="table table-bordered">
            <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">customer Email Id</th>
      <th scope="col">customer Order Id</th>
      <th scope="col">order Date</th>
      <th scope="col">order Type</th>
      <th scope="col">purchase Order Id</th>
      <th scope="col">shipping Info</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>




    @foreach($GetOrders as $walmart)
    <tr>
      <th scope="row">{{ $walmart->id}}</th>
      <td>{{$walmart->customer_email_id}}</td>
      <td>{{$walmart->customer_order_id}}</td>
      <td>{{$walmart->order_date}}</td>
      <td>{{$walmart->order_type}}</td>
      <td>{{$walmart->purchase_order_id}}</td>
      @foreach($GetShipDetails as $inspection)
          <?php $infraction_data = json_decode(json_encode($inspection->shipping_info),TRUE); ?>
      <td>{{ ($infraction_data) }}</td>
      @endforeach
      <td><a href="#" class="btn btn-sm btn-primary">Print Lable</a>

          </td>
    </tr>
    @endforeach
  </tbody>
    </table>
    {{$GetOrders->links()}}
        </div>
  </div>
    </div>
</x-app-layout>
