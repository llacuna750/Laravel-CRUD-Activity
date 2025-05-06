<x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Product
            </h2>
        </x-slot>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <style>
            .whitebackground {
                background-color: white;
                height: ;
                margin: 10px;
                padding: 10px;
            }
            
            table {
                border-collapse: collapse;
                text-align: center;
                /* margin: auto; */
            }

            th, tr, td {
                border: 1px solid black;
                padding: 1em;
            }
        </style>
    </head>
    <body>
        <div class="whitebackground">
            <h1>Product</h1>
            <div>
                @if(session()->has('success'))
                    <div>
                        {{session('success')}}
                    </div>
                @endif
            </div>
                <div>
                    <a href="{{route('product.create')}}">Create a Product</a>
                </div>

            <div>
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    @foreach($products as $product)
                        <tr>
                            <td>{{$product->id}}</td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->qty}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->description}}</td>
                            <td>
                                <a href="{{route('product.edit', ['product' => $product])}}">Edit</a>
                            </td>
                            <td>
                                <form method="post" action="{{route('product.destroy', ['product' => $product])}}">
                                    @csrf
                                    @method('delete')
                                    <input type="submit" value="Delete" />
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
        
    </body>
    </html>
</x-app-layout>