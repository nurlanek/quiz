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
      <th scope="col">order Lines</th>
      <th scope="col">order Type</th>
      <th scope="col">original Customer Order ID</th>
      <th scope="col">purchase Order Id</th>
      <th scope="col">shipping Info</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    @foreach($w_relased_order as $walmart)
    <tr>
      <th scope="row">{{ $walmart->id}}</th>
      <td>{{$walmart->customerEmailId}}</td>
      <td>{{$walmart->customerOrderId}} </td>
      <td>{{$walmart->orderDate}} </td>
      <td> </td>
      <td>{{$walmart->orderType}} </td>
      <td> </td>
      <td>{{$walmart->purchaseOrderId}} </td>
      <td>{{$walmart->shippingInfo}} </td>
      <td><a href="#" class="btn btn-sm btn-primary"><i class="fa fa-pen"></i>
          <a href="#" class="btn btn-sm btn-danger"><i class="fa fa-times"></i>
          </td>
    </tr>
    @endforeach
  </tbody>
    </table>
    {{$w_relased_order->links()}}
        </div>
  </div>
    </div>
</x-app-layout>
