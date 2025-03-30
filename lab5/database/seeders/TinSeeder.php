<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TinSeeder extends Seeder
{
    public function run()
    {
        DB::table('tin')->insert([
            [
                'tieude' => 'Hoa Đà Quý rang rõ núi lửa Chu Đăng Ya',
                'xem' => 1000,
                'ngayDang' => '2025-03-01',
                'idLoai' => 1,
                'tomTat' => 'Bài viết mô tả hiện tượng núi lửa Chu Đăng Ya được quan sát rõ ràng từ Hoa Đà Quý.',
                'noiDung' => '<p>Hoa Đà Quý, một địa điểm nổi tiếng với cảnh quan thiên nhiên hùng vĩ, đã trở thành tâm điểm chú ý khi núi lửa Chu Đăng Ya hoạt động mạnh mẽ. Hiện tượng này thu hút hàng nghìn du khách đến chiêm ngưỡng và khám phá vẻ đẹp của thiên nhiên.</p>'
            ],
            [
                'tieude' => 'Poet Huu Loan dies at age 95',
                'xem' => 950,
                'ngayDang' => '2025-03-02',
                'idLoai' => 1,
                'tomTat' => 'Tin tức về sự ra đi của nhà thơ nổi tiếng Huu Loan ở tuổi 95.',
                'noiDung' => '<p>Nhà thơ Hữu Loan, người đã để lại dấu ấn sâu đậm trong làng thơ Việt Nam với những tác phẩm đậm chất nhân văn, đã qua đời ở tuổi 95 tại quê nhà. Ông được biết đến với bài thơ "Màu tím hoa sim" nổi tiếng.</p>'
            ],
            [
                'tieude' => 'Võ "kịch câm" tại châu Âu',
                'xem' => 900,
                'ngayDang' => '2025-03-03',
                'idLoai' => 2,
                'tomTat' => 'Giới thiệu về nghệ thuật võ kịch câm độc đáo đang được trình diễn tại châu Âu.',
                'noiDung' => '<p>Võ kịch câm là một loại hình nghệ thuật kết hợp giữa võ thuật và biểu diễn không lời, mang đến những câu chuyện đầy cảm xúc qua ngôn ngữ cơ thể. Các buổi trình diễn tại châu Âu đã thu hút đông đảo khán giả yêu nghệ thuật.</p>'
            ],
            [
                'tieude' => 'Kỷ lục thời chiến',
                'xem' => 850,
                'ngayDang' => '2025-03-04',
                'idLoai' => 3,
                'tomTat' => 'Báo cáo về các kỷ lục đáng nhớ được thiết lập trong thời kỳ chiến tranh.',
                'noiDung' => '<p>Trong thời kỳ chiến tranh, nhiều kỷ lục ấn tượng đã được ghi nhận, từ những chiến công oanh liệt trên chiến trường đến những câu chuyện vượt qua nghịch cảnh của con người. Bài viết này tổng hợp những kỷ lục nổi bật nhất.</p>'
            ],
            [
                'tieude' => 'Nguyễn thục toản phấn trén thế giới',
                'xem' => 800,
                'ngayDang' => '2025-03-05',
                'idLoai' => 4,
                'tomTat' => 'Câu chuyện về Nguyễn Thục Toản và thành tích nổi bật trên toàn cầu.',
                'noiDung' => '<p>Nguyễn Thục Toản, một tài năng trẻ của Việt Nam, đã ghi dấu ấn trên đấu trường quốc tế với những thành tựu đáng kinh ngạc trong lĩnh vực khoa học và công nghệ. Câu chuyện của cô là nguồn cảm hứng cho thế hệ trẻ.</p>'
            ],
            [
                'tieude' => 'Cách làm số mi',
                'xem' => 750,
                'ngayDang' => '2025-03-06',
                'idLoai' => 2,
                'tomTat' => 'Hướng dẫn đơn giản để tự làm món số mi thơm ngon tại nhà.',
                'noiDung' => '<p>Số mi là món ăn truyền thống thơm ngon, dễ làm. Bài viết này sẽ hướng dẫn bạn từng bước để tạo ra món số mi hấp dẫn với nguyên liệu đơn giản như bột mì, trứng và gia vị, phù hợp cho bữa ăn gia đình.</p>'
            ],
            [
                'tieude' => 'Xem tivi nhiều, ra nghiện đá sốm',
                'xem' => 700,
                'ngayDang' => '2025-03-07',
                'idLoai' => 1,
                'tomTat' => 'Cảnh báo về tác hại của việc xem tivi quá nhiều dẫn đến nghiện đá sốm.',
                'noiDung' => '<p>Việc xem tivi quá nhiều không chỉ ảnh hưởng đến sức khỏe mắt mà còn có thể dẫn đến các thói quen không lành mạnh như nghiện đá sốm. Các chuyên gia khuyến cáo nên kiểm soát thời gian xem tivi và tham gia các hoạt động ngoài trời.</p>'
            ],
            [
                'tieude' => 'Ngưòi hùng trong cuộc hành ky dieu ở New York',
                'xem' => 650,
                'ngayDang' => '2025-03-08',
                'idLoai' => 3,
                'tomTat' => 'Câu chuyện về người hùng xuất hiện trong cuộc hành trình kỳ diệu tại New York.',
                'noiDung' => '<p>Một người hùng vô danh đã xuất hiện trong cuộc hành trình đầy cảm hứng tại New York, mang đến hy vọng và niềm tin cho cộng đồng. Câu chuyện của anh đã lan truyền rộng rãi và truyền cảm hứng cho hàng triệu người.</p>'
            ],
            [
                'tieude' => 'BCI Asia gives architecture awards',
                'xem' => 600,
                'ngayDang' => '2025-03-09',
                'idLoai' => 4,
                'tomTat' => 'Tin tức về lễ trao giải kiến trúc uy tín do BCI Asia tổ chức.',
                'noiDung' => '<p>BCI Asia đã tổ chức lễ trao giải kiến trúc thường niên, vinh danh những công trình nổi bật và sáng tạo nhất trong khu vực. Sự kiện thu hút sự tham gia của nhiều kiến trúc sư hàng đầu từ khắp nơi trên thế giới.</p>'
            ],
            [
                'tieude' => 'Đề nhàn biệt mắt ông tổ hay xâu?',
                'xem' => 550,
                'ngayDang' => '2025-03-10',
                'idLoai' => 4,
                'tomTat' => 'Thảo luận về câu hỏi liệu đề nhàn có phải là mắt ông tổ hay xâu.',
                'noiDung' => '<p>Bài viết thảo luận về một vấn đề thú vị trong văn hóa dân gian: liệu "đề nhàn" có thực sự là "mắt ông tổ" hay chỉ là một cách hiểu sai lệch? Các ý kiến trái chiều được phân tích chi tiết để làm sáng tỏ vấn đề.</p>'
            ],
        ]);
    }
}