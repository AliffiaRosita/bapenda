@php
use App\Models\Visitor;
use Carbon\Carbon;
$dateNow = Carbon::now();
$totalVisitor = Visitor::count();
@endphp
<footer class="footer footer-1">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                    <div class="footer-widget widget-links">
                        <div class="footer-widget-title">
                            <h5 class="text-center">Tentang Kami</h5>
                        </div>
                        <img class="img-fluid px-4" src="{{asset('img/logo-bapenda.png')}}" alt="client"/>
                        <div class="widget-content">
                            <p>Bapenda Provinsi Kalimantan Timur Merupakan unsur pelaksana urusan pemerintahan di bidang pendapatan daerah  dan mempunyai Tugas Pokok melaksanakan urusan pemerintahan daerah di bidang pajak daerah, retribusi dan pendapatan lain-lain, dana perimbangan, perencanaan, pembinaan dan pengawasan pendapatan.</p>
                        </div>
                    </div>
                </div>
                <!--  End .col-lg-2-->
                <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                    <div class="footer-widget widget-links">
                        <div class="footer-widget-title">
                            <h5 class="text-center">Alamat Kantor</h5>
                        </div>
                        <div class="widget-content">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31917.39304585554!2d117.09037071562499!3d-0.48711259999997475!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2df67ee101204d39%3A0x7da5d57425857373!2sBADAN%20PENDAPATAN%20DAERAH%20PROVINSI%20KALIMANTAN%20TIMUR!5e0!3m2!1sid!2sid!4v1670684149931!5m2!1sid!2sid"
                                width="260px" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                                <p>Jl. Mayjend. M.T Haryono, Samarinda. Telp. (0541) 734969, Fax. 731208</p>
                        </div>
                    </div>
                </div>
                <!--  End .col-lg-2-->
                <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                    <div class="footer-widget widget-links">
                        <div class="footer-widget-title">
                            <h5 class="text-center">Jam Pelayanan</h5>
                        </div>
                        <div class="widget-content justify-content-center">
                            <table>
                                <tr>
                                    <td width="55%">Senin - Kamis</td>
                                    <td width="5%">:</td>
                                    <td>07.30 – 16.00</td>
                                </tr>
                                <tr>
                                    <td>Jumat</td>
                                    <td>:</td>
                                    <td>07.30 – 11.30</td>
                                </tr>
                                <tr>
                                    <td>Sabtu - Minggu</td>
                                    <td>:</td>
                                    <td>Tutup</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                    <div class="footer-widget widget-links">
                        <div class="footer-widget-title">
                            <h5 class="text-center">Statistik Pengunjung</h5>
                        </div>
                        <div class="tick" data-value="{{sprintf("%08d", $totalVisitor);}}" id="visitor">
                            <span id="my-flip" data-view="flip"></span>
                        </div>
                        <div class="widget-content">
                            <table width="100%" class="mt-2">
                                <tr>
                                    <td width="55%">Pengunjung Hari ini</td>
                                    <td width="5%">:</td>
                                    <td class="text-end"><span class="badge bg-primary  mt-2" id="today-visitor"></span></td>
                                </tr>
                                <tr>
                                    <td>Pengunjung Bulan ini</td>
                                    <td>:</td>
                                    <td class="text-end"><span class="badge bg-secondary  mt-2" id="month-visitor"></span></td>
                                </tr>
                                <tr>
                                    <td>Pengunjung Tahun ini</td>
                                    <td>:</td>
                                    <td class="text-end"><span class="badge bg-danger  mt-2" id="year-visitor"></span></td>
                                </tr>
                                <tr>
                                    <td>Total Pengunjung</td>
                                    <td>:</td>
                                    <td class="text-end"><span class="badge bg-warning  mt-2" id="total-visitor"></span></td>
                                </tr>
                                <tr>
                                    <td>Pengunjung Online</td>
                                    <td>:</td>
                                    <td class="text-end"><span class="badge bg-success  mt-2" id="online-visitor"></span></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                <!--  End .col-lg-3-->
            </div>
            <!-- End .row-->
        </div>
        <!--  End .container-->
    </div>
    <!--  End .footer-top-->
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="footer-copyright">
                        <div class="copyright"><span>&copy; Copyright {{$dateNow->year}} - Badan Pendapatan Daerah Provinsi Kalimantan
                                Timur </span>
                                <ul class="list-unstyled social-icons">
                                    <li> <a class="share-facebook" href="https://www.facebook.com/bapenda.prov.kaltim/" target="__BLANK"><i class="energia-facebook"></i>facebook </a></li>
                                    <li> <a class="share-twitter" href="https://twitter.com/BapendaKaltim/" target="__BLANK"><i class="energia-twitter"></i>twitter</a></li>
                                    <li> <a class="share-youtube" href="https://www.youtube.com/@bapendaprov.kaltim3600" target="__BLANK"><i class="energia-youtube"></i>youtube</a></li>
                                  </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--  End .row-->
    </div>
    <!--  End .footer-bottom-->
</footer>
