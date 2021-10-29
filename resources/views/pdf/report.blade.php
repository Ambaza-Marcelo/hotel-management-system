<!DOCTYPE html>
<html>
<head>
	<title>rapport</title>

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
	<h3>Rapport</h3>
	<table>
		<thead>
                            <tr>
                                <th>#</th>
                                <th>Date</th>
                                <th>Nom P.</th>
                                <th>Stock I.</th>
                                <th>Entree</th>
                                <th>Tot. P.A</th>
                                <th>Stock Total</th>
                                <th>Sortie</th>
                                <th>Tot. P.V</th>
                                <th>Stock R.</th>
                                <th>Employe</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($report as $data)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>Le {{ \Carbon\Carbon::parse($data->date)->format('d/m/Y') }}</td>
                                    <td>{{ $data->nom_produit }}</td>
                                    <td> {{ $data->stock_initial }} </td>
                                    <td>{{ $data->entree }}</td>
                                    <td> {{ number_format($data->total_prix_achat_total,0,',','.') }} FBU</td>
                                    <td> {{ $data->total_stock_total }}</td>
                                    <td>{{ $data->quantite_sortie }}</td>
                                    <td>{{ number_format($data->total_prix_vente_total,0,',','.') }} FBU</td>
                                    <td> {{ $data->total_stock_restant }} </td>
                                    <td> {{ $data->utilisateur }} </td>
                                </tr>
                            @endforeach
                          </tbody>
	</table>
</body>
</html>