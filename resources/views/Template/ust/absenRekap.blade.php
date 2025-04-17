<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-body">
            <h2 class="text-center mb-4">
                @if($bulan)
                    Rekap Bulan {{ DateTime::createFromFormat('!m', $bulan)->format('F') }} {{ $tahun }}
                @elseif($semester)
                    Rekap Semester {{ $semester }} - Tahun {{ $tahun }}
                @else
                    Rekap Absensi
                @endif
            </h2>

            <!-- Filter -->
            <form method="GET" action="{{ route('absensi.rekap') }}" class="row g-2 align-items-end mb-4">
                <div class="col-md-2">
                    <label class="form-label">Bulan</label>
                    <select name="bulan" class="form-select">
                        @for($i = 1; $i <= 12; $i++)
                            <option value="{{ $i }}" {{ request('bulan', $bulan) == $i ? 'selected' : '' }}>
                                {{ DateTime::createFromFormat('!m', $i)->format('F') }}
                            </option>
                        @endfor
                    </select>
                </div>

                <div class="col-md-2">
                    <label class="form-label">Tahun</label>
                    <select name="tahun" class="form-select">
                        @for($y = 2023; $y <= now()->year; $y++)
                            <option value="{{ $y }}" {{ request('tahun', $tahun) == $y ? 'selected' : '' }}>{{ $y }}</option>
                        @endfor
                    </select>
                </div>

                <div class="col-md-2">
                    <label class="form-label">Kelas</label>
                    <select name="kelas_id" class="form-select">
                        <option value="">Pilih Kelas</option>
                        @foreach($kelasOptions as $id => $nama)
                            <option value="{{ $id }}" {{ request('kelas_id') == $id ? 'selected' : '' }}>{{ $nama }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-2">
                    <label class="form-label">Kamar</label>
                    <select name="kamar_id" class="form-select">
                        <option value="">Pilih Kamar</option>
                        @foreach($kamarOptions as $id => $nama)
                            <option value="{{ $id }}" {{ request('kamar_id') == $id ? 'selected' : '' }}>{{ $nama }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-2">
                    <label class="form-label">Semester</label>
                    <select name="semester" class="form-select">
                        <option value="">Pilih Semester</option>
                        <option value="1" {{ request('semester') == '1' ? 'selected' : '' }}>Semester 1</option>
                        <option value="2" {{ request('semester') == '2' ? 'selected' : '' }}>Semester 2</option>
                    </select>
                </div>

                <div class="col-md-2 text-end">
                    <button type="submit" class="btn btn-primary w-100">Filter</button>
                </div>
            </form>

            <!-- Tabel Rekap -->
            <div class="table-responsive">
                <table class="table table-bordered table-striped text-center align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Santri</th>
                            <th>Hadir</th>
                            <th>Izin</th>
                            <th>Sakit</th>
                            <th>Alfa</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($rekap as $santriId => $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="text-start">{{ $santris[$santriId]->user->name ?? '-' }}</td>
                                <td>{{ $data['hadir'] }}</td>
                                <td>{{ $data['izin'] }}</td>
                                <td>{{ $data['sakit'] }}</td>
                                <td>{{ $data['alfa'] }}</td>
                                <td class="fw-bold">{{ array_sum($data) }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted">Tidak ada data absensi untuk periode ini.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
