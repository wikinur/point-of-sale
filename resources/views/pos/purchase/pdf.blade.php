<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>
    <link rel="stylesheet" href="{{ asset('asset/plugins/bootstrap/bootstrap.min.css') }}">
</head>
<body>
    <div class="row">
        <div class="col-xs-12">
            <h3 class="text-center">
                <b><i>{{ $purchase->document_no }}</i></b>
            </h3>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <table class="table">
                <tbody>
                    <tr width="50%">
                        <th>Nama</th>
                        <td>:</td>
                        <td>{{ $ph->name }}</td>

                        <th>Vendor</th>
                        <td>:</td>
                        <td>{{ $purchase->suppliers->supplier_name }}</td>
                    </tr>

                    <tr>
                        <th>Telpon</th>
                        <td>:</td>
                        <td>{{ $ph->no_telp }}</td>

                        <th>Telpon Vendor</th>
                        <td>:</td>
                        <td>{{ $purchase->suppliers->telpon }}</td>
                    </tr>

                    <tr>
                        <th>Alamat</th>
                        <td>:</td>
                        <td>{{ $ph->address }}</td>

                        <th>Alamat Vendor</th>
                        <td>:</td>
                        <td>{{ $purchase->suppliers->address }}</td>
                    </tr>

                    <tr>
                        <th>Document No</th>
                        <td>:</td>
                        <td>{{ $purchase->document_no }}</td>

                        <th>Status</th>
                        <td>:</td>
                        <td>{{ $purchase->statuss->status }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <hr>

        <div class="row">
        <div class="col-xs-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Produk</th>
                        <th>qty</th>
                        <th>Harga Beli</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $tot_qty = 0;
                        $tot_buy = 0;
                        $tot_grand_total = 0;    
                    ?>
                    @foreach ($purchase->lines as $line)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $line->products->product_name }}</td>
                            <td>{{ $line->qty }}</td>
                            <td>{{ $line->buy }}</td>
                            <td>{{ $line->grand_total }}</td>
                        </tr>
                        <?php
                            $tot_qty += $line->qty;
                            $tot_buy += $line->buy;
                            $tot_grand_total += $line->grand_total;
                        ?>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>

                        <th></th>
                        <th>
                            <b>
                                <i>Total</i>
                            </b>
                        </th>
                        <th>
                            <b>
                                <i>{{ $tot_qty }}</i>
                            </b>
                        </th>
                        <th>
                            <b>
                                <i>{{ $tot_buy }}</i>
                            </b>
                        </th>
                        <th>
                            <b>
                                <i>{{ $tot_grand_total }}</i>
                            </b>
                        </th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-4 text-center">
            <p>Menyetujui</p>
            <br>
            <br>
            <br>
            .................
        </div>
    </div>

    <script>
        window.print();
    </script>
</body>
</html>