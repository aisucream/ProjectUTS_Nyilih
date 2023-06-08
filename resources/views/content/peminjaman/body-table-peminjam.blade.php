@if (Auth::user()->level == 'mahasiswa')

    <thead>
        <tr>
            <th>Barang</th>
            <th>Jumlah Barang</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $v)
            <tr>

                <td>{{ $v->barang->nama_barang }}</td>
                <td>{{ $v->jumlah_barang }}</td>

                <td>
                    <form action="{{ route('pinjam.destroy', $v->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm me-2"><i class="bi-trash"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
@elseif (Auth::user()->level == 'admin')
    <thead>
        <tr>
            <th>Nama Peminjam</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data->groupBy('user_id') as $userTransactions)
            @foreach ($userTransactions as $index => $transaction)
                @if ($index === 0)
                    <tr>
                        <td>{{ $transaction->user->name }}</td>

                        <td>
                            <a href="{{ route('pinjam.show', ['pinjam' => $transaction->user_id]) }}"
                                class="btn btn-outline-dark btn-sm me-2">
                                <i class="bi-person-lines-fill"></i>
                            </a>
                        </td>
                    </tr>
                @endif
            @endforeach
        @endforeach
    </tbody>

@endif
