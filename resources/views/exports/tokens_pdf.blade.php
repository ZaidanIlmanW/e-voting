<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Token </title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px 12px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1 style="text-align: center;">Daftar Token</h1>
    
    <table>
        <thead>
            <tr>
                <th>Token</th>
                <th>Setting Pemilihan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tokens as $token)
                <tr>
                    <td>{{ $token->token }}</td>
                    <td>{{ $token->setting->nama_setting ?? 'Tidak Ada' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
