<!DOCTYPE html>
<html>
<head>
    <title>rapport par mois</title>

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
    <h3>Rapport par Mois</h3>
    <table>
        <thead>
                            <tr>
                                <th width="50">#</th>
                                <th width="50">Mois</th>
                                <th width="50">Annee</th>
                                <th width="150">P.A</th>
                                <th width="150">P.V</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($report as $data)
                               <tr>
                                    <td>{{ $loop->index+1}}</td>
                                    <td>{{ $data->month }}</td>
                                    <td>{{ $data->year }}</td>
                                    <td> {{ number_format($data->total_prix_achat,0,',','.') }} FBU</td>
                                    <td> {{ number_format($data->total_prix_vente,0,',','.') }} FBU</td>
                                    
                                </tr>
                            @endforeach
                          </tbody>
    </table>
</body>
</html>