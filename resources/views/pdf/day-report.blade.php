<!DOCTYPE html>
<html>
<head>
    <title>rapport par jour</title>

    <style type="text/css">
        table,thead,tr,th,tbody,td{
            border-collapse: collapse;border: 1px solid black;
        }
        h3{
            text-align: center;
            text-decoration: underline;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h3>Rapport Par Jour</h3>
    <table>
        <thead>
                            <tr>
                                <th width="50">#</th>
                                <th width="100">Date</th>
                                <th width="180">P.A</th>
                                <th width="180">P.V</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($report as $data)
                               <tr>
                                    <td>{{ $loop->index+1}}</td>
                                    <td>Le {{ $data->day }}/{{ $data->month }}/{{ $data->year }}</td>
                                    <td> {{ number_format($data->total_prix_achat,0,',','.') }} FBU</td>
                                    <td> {{ number_format($data->total_prix_vente,0,',','.') }} FBU</td>
                                    
                                </tr>
                            @endforeach
                          </tbody>
    </table>
</body>
</html>