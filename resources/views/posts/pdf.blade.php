<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Data Posts</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px 12px;
            border: 1px solid #000;
            text-align: center;
        }
        th {
            background-color: #f4f4f4;
        }
        .no-image {
            color: #ff0000;
        }
    </style>
</head>
<body>
    <h2>Data Posts</h2>
    <table>
        <thead>
            <tr>
                <th>GAMBAR</th>
                <th>JUDUL</th>
                <th>CONTENT</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($posts as $post)
                <tr>
                    <td>
                        @if($post->image)
                            <img src="{{ public_path('storage/' . $post->image) }}" style="width: 100px;" alt="Post Image">
                        @else
                            <span class="no-image">No Image</span>
                        @endif
                    </td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->content }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">Data Post belum Tersedia.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
