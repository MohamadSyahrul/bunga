<html>

<head>
    <style type="text/css">
        .style1 {
            font-size: large
        }

        .style2 {
            font-size: medium
        }

        

    </style>
    <title>Cetak Data Semua Pegawai</title>
</head>

<body>
    <form>
        <table width="910" border="0" align="center" cellpadding="0" cellspacing="0">
            <tbody>
                <tr>
                    <td width="15%">
                        <div align="left">
                            <h2 align="center"><img src="{{ asset('/app-assets/images/bunga.png') }}" width="133" height="124"></h2>
                        </div>
                    </td>
                    <td width="85%">
                        <div align="center" class="style1"><strong>Toko Bunga Banyuwangi<br>
                                ( KEMBYANG ISUN )</strong><br>
                            <span class="style2">Jl. Ikan bedul (UD Kembar siam) Karangrejo-banyuwangi</span><br>
                            <span class="style2">Whatsapp :082213039596 Instagram : @kembyangisun</span></div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <hr noshade="">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                    <button type="button" name="cetak" id="cetak" class="print" onclick="Cetakan()"
                                            style="visibility: visible;">Cetak</button>
                      
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <th style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Tanggal pembelian</th>
                                <th style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Tanggal penjualan</th>
                                <th style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Pembeli</th>
                                <th style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Keuntungan</th>
                            </tr>
                                    @foreach ($dp as $item)
                            <tr>
                                <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">
                                @foreach ($dlp->where('pesanan_id',$item->id) as $i)
                                            {{Carbon\Carbon::parse($i->barang->tanggal_pembelian)->isoFormat('dddd, D MMMM Y')}} <br>
                                            @endforeach
                                </td>
                                <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">
                                    {{Carbon\Carbon::parse($item->created_at)->isoFormat('dddd, D MMMM Y')}}
                                </td>
                                <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">
                                    {{$item->pesan->nama}}
                                </td>

                                <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">
                                    @foreach ($dlp->where('pesanan_id',$item->id) as $i)
                                            Rp. {{($i->barang->harga_jual * $i->jumlah) - ($i->barang->harga_awal * $i->jumlah)}} <br>
                                    @endforeach
                                </td>
                            </tr>
                                    @endforeach

                            
                            </table>

                    </td>
                </tr>
                <tr bgcolor="#FFFFFF">
                    <td colspan="3">&nbsp;</td>
                </tr>
            </tbody>
        </table>
    </form>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        function Cetakan() {
            var x = document.getElementsByName("cetak");
            for (i = 0; i < x.length; i++) {
                x[i].style.visibility = "hidden";
            }
            alert("Jangan di tekan tombol OK sebelum dokumen selesai tercetak!");
            window.print();
            for (i = 0; i < x.length; i++) {
                x[i].style.visibility = "visible";
            }
        }

    </script>
</body>

</html>
