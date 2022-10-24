@extends('layout.master')
@section('main')
    <div class="container">
        <div class="title-wapper">
            <h1 class="entry-title my-3">DU HỌC HÀ LAN</h1>
        </div>

        @php
        $link = 'https://www.thoughtco.com/thmb/p0WUdP8jKcpTsPp5lf2xTFbdB7E=/2123x1194/smart/filters:no_upscale()/GettyImages-937057490-401a1830296d458e98f62fdc7b6417d1.jpg';
        if ($country_image = Storage::get('admin/image/' . $country->image)) {
            $link = 'data:image/jpeg;base64, ' . base64_encode($country_image);
        }
    @endphp
    <div class="container-fluid d-flex justify-content-center">
        <div class="img-inner">
            <img style=" height:500px" src="{{ $link }}" alt="">
        </div>
    </div>
    <div class="col-md-12 ">
        <div class="wpb_wrapper">
            {!! $country->description !!}
        </div>
    </div>


            <div class="col-md-12">
                <div class="title-wapper">
                    <h1 class="entry-title my-3"> HỌC PHÍ DU HỌC HÀ LAN</h1>
                </div>
                <div class="col-inner">
                    <ul>
                        <li><em>Đại học nghiên cứu sẽ có học phí:</em></span></li>
                    </ul>
                    <p style="text-align: justify;">Bậc cử nhân thông thường: €6,500 – 17,000/ năm (học từ 3-5 năm)</span>
                    </p>
                    <p style="text-align: justify;">Bậc thạc sĩ thông thường: €7,325 – 28,800/ năm (học từ 1-2 năm)</span>
                    </p>
                    <p style="text-align: justify;">Các trường nghiên cứu thì thời gian học của các bạn sẽ kéo dài từ 3-5
                        năm.</span></p>
                    <ul>
                        <li><em>Đại học ứng dụng sẽ có học phí:</em></span></li>
                    </ul>
                    <p style="text-align: justify;">Bậc cử nhân thông thường: €7,325 – 18,200/ năm (học từ 2-4 năm)</span>
                    </p>
                    <p style="text-align: justify;">Thạc thạc sĩ thông thường: €7,000 – 20,400/năm (học từ 1-2 năm)</span>
                    </p>
                    <ul>
                        <table class=" table table-bordered">
                            <tbody>
                                <tr class="active">
                                    <td class="active">
                                        <p><strong>Tên trường</strong></p>
                                    </td>
                                    <td>
                                        <p><strong>Chính sách học phí</strong></p>
                                    </td>
                                    <td>
                                        <p><strong>	Chuyên ngành nổi bật</strong></p>
                                    </td>
                                </tr>
                                @if (!empty($country->schools))
                                @foreach ($country->schools as $school)
                                    <tr>
                                        <td><span style="font-weight: 400;">{{ $school->name }}</span></td>
                                        <td><span style="font-weight: 400;">Khoảng € 26,533/năm</span></td>
                                        <td><span style="font-weight: 400;">{{ $school->majors->implode('name', ', ') }}</span></td>
                                    </tr>
                                @endforeach
                                @else

                                <tr>
                                    <td>
                                        <p>Holland International Study Centre</p>
                                    </td>
                                    <td>
                                        <p>Khoảng € 30,060/năm</p>

                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                        <p>Amsterdam University of Applied Sciences (AUAS)</p>
                                    </td>
                                    <td>
                                        <p>Khoảng € 28,103/năm</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>University of Amsterdam (UvA)</p>
                                    </td>
                                    <td>
                                        <p>Khoảng € 33,171/năm</p>
                                   </td>

                                </tr>
                                @endif
                            </tbody>
                        </table>
                        <li><em>Chi phí sinh hoạt du học Hà Lan</em></span></li>
                    </ul>
                    <table class="table table-bordered" style="border:3px">
                        <tbody>
                            <tr>
                                <td valign="top" width="312">
                                    <p><strong>Các khoản phí</span></strong></p>
                                </td>
                                <td valign="top" width="312">
                                    <p><strong>Mức phí</span></strong></p>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top" width="312">
                                    <p>Ăn ở</span></p>
                                </td>
                                <td valign="top" width="312">
                                    <p>800-900 EUR/ tháng</span></p>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top" width="312">
                                    <p>Bảo hiểm</span></p>
                                </td>
                                <td valign="top" width="312">
                                    <p>300-700 EUR/ năm</span></p>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top" width="312">
                                    <p><span style="font-family: 'times new roman', times; font-size: medium;">Sách
                                            vở</span></p>
                                </td>
                                <td valign="top" width="312">
                                    <p><span style="font-family: 'times new roman', times; font-size: medium;">200 EUR/
                                            năm</span></p>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top" width="312">
                                    <p><span style="font-family: 'times new roman', times; font-size: medium;">Đi lại</span>
                                    </p>
                                </td>
                                <td valign="top" width="312">
                                    <p><span style="font-family: 'times new roman', times; font-size: medium;">100 EUR/
                                            năm</span></p>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top" width="312">
                                    <p><span style="font-family: 'times new roman', times; font-size: medium;">Tổng</span>
                                    </p>
                                </td>
                                <td valign="top" width="312">
                                    <p><span style="font-family: 'times new roman', times; font-size: medium;">19.000 –
                                            26.000 EUR/ năm</span></p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <p style="text-align: justify;">Bên cạnh đó sinh viên cũng có thể tự trả học phí cho mình bằng cách đi
                        làm thêm vào các ngày nghỉ với số lượng thời gian nhất định. Ngoài ra nhà nước còn cho phép sinh
                        viên vay tiền có hạn định mà không phải trả lãi. Sinh viên chỉ phải trả số tiền này khi tốt nghiệp
                        và tìm được việc làm.</p>
                </div>
            </div>

            <div class="col-md-12">
                <div class="title-wapper">
                    <h1 class="entry-title my-3"> HỒ SƠ CẦN THIẾT KHI DU HỌC HÀ LAN</h1>
                </div>
                <div class="col-inner">
                    <p style="text-align: justify;">+ Chứng chỉ tiếng Anh đạt 550 TOEFL hoặc 6.0 IELTS</span></p>
                    <p style="text-align: justify;">+ Giấy khai sinh.</span></p>
                    <p style="text-align: justify;">+ Đơn xin học bằng tiếng Anh (tự giới thiệu bản thân, gia đình, giới
                        thiệu về quá trình đã học, về kinh nghiệm làm việc nếu có, giải thích tại sao lại chọn khoá học
                        này)</span></p>
                    <p style="text-align: justify;">+ Lý lịch có xác nhận của chính quyền địa phương và phải đóng dấu giáp
                        lai ảnh, dịch sang tiếng Anh ( C.V.)</span></p>
                    <p style="text-align: justify;">+ Bằng tốt nghiệp PTTH, Đại học hoặc bằng tốt nghiệp cao nhất, học bạ,
                        bảng điểm.</span></p>
                    <p style="text-align: justify;">+ Các bằng cấp khác về ngoại ngữ, tin học, kế toán (nếu có)</span></p>
                    <p style="text-align: justify;">+ 12 ảnh mầu (4x6)</span></p>
                    <p style="text-align: justify;">+ Copy chứng minh thư 5 bản, hộ khẩu 5 bản</span></p>
                    <p style="text-align: justify;">+ Kết quả khám sức khỏe (Chứng minh không nhiễm HIV, nghiện hút và lao
                        phổi)</span></p>
                    <p style="text-align: justify;">+ Cam kết của gia đình theo mẫu</span></p>
                    <p style="text-align: justify;">+ Mẫu đơn nhập học của trường muốn theo học</span></p>
                    <p style="text-align: justify;">+ Mẫu đơn xin visa của Đại sứ quán Hà Lan</span></p>
                    <p style="text-align: justify;">+ Camkết trách nhiệm thực hiện nghiêm túc về du học tự túc</span></p>
                    <p style="text-align: justify;">+ Xác nhận của công an Phường sở tại Chứng minh không tiền án, tiền
                        sự</span></p>
                    <p style="text-align: justify;">+ Giấy chứng nhận tình trạng Hôn nhân (có hoặc chưa có kết hôn đều cần
                        giấy chứng nhận)</span></p>
                    <p style="text-align: justify;">Tất cả các giấy tờ trên đều phải dịch và công chứng sang tiếng Anh.
                        Megastudy hỗ trợ dịch thuật và công chứng hồ sơ miễn phí cho học sinh.</span></p>
                </div>
            </div>

            <div class="col-md-12">
                <div class="title-wapper">
                    <h1 class="entry-title my-3"> NHỮNG LÝ DO NÊN DU HỌC HÀ LAN</h1>
                </div>
                <div class="col-inner">
                    <p style="text-align: justify;">- Chất lượng đào tạo giáo dục xuất sắc: Hà Lan<em><strong>
                            </strong></em>đã được quốc tế ghi nhận về tính thực tế và ứng dụng cao.</span></p>
                    <p style="text-align: justify;">- Tất cả các khóa học đều theo đúng tiêu chuẩn Châu Âu và được bảo đảm
                        chất lượng bởi chính phủ.</span></p>
                    <p style="text-align: justify;">- Chi phí học tập hợp lý: Học phí các trường ở Hà Lan thường thấp hơn
                        so với các trường ở Mỹ, Canada, Anh… do giáo dục bậc cao Hà Lan nhận được sự hỗ trợ rất lớn từ Chính
                        phủ.</span></p>
                    <p style="text-align: justify;">- Chương trình giảng dạy hoàn toàn bằng tiếng Anh</span></p>
                    <p style="text-align: justify;">- Kết hợp giảng dạy hoàn hảo áp dụng tốt giữa lý thuyết và thực
                        hành</span></p>
                    <p style="text-align: justify;">– Môi trường học tập quốc tế (Hà Lan là một trong nững nước có lượng du
                        học sinh theo học đông nhất Châu Âu)</span></p>
                    <p style="text-align: justify;">– Sinh viên có cơ hội được học và thực tập tại một quốc gia khác ngoài
                        Hà Lan.</span></p>
                    <p style="text-align: justify;">– Các trường Đại học tại Hà Lan luôn rất quan tâm đến sinh viên quốc
                        tế, cung cấp nhà ở, tổ chức các chương trình giới thiệu về văn hoá, đất nước, con người Hà
                        Lan.</span></p>
                    <p style="text-align: justify;">- Sau khi tốt nghiệp, học sinh quốc tế có thể ở lại Hà Lan 1 năm để làm
                        việc.</span></p>
                </div>
            </div>
    </div>
    @endsection
