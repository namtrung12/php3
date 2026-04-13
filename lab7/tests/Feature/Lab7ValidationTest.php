<?php

namespace Tests\Feature;

use App\Mail\GuiMail;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class Lab7ValidationTest extends TestCase
{
    public function test_hs_form_can_be_displayed(): void
    {
        $response = $this->get('/hs');

        $response->assertOk();
        $response->assertSee('NHẬP THÔNG TIN HỌC SINH');
    }

    public function test_hs_form_validates_required_fields(): void
    {
        $response = $this->from('/hs')->post('/hs', []);

        $response->assertRedirect('/hs');
        $response->assertSessionHasErrors(['hoten', 'tuoi', 'ngaysinh']);
    }

    public function test_hs_form_accepts_valid_data(): void
    {
        $response = $this->post('/hs', [
            'hoten' => 'Nguyen Van A',
            'tuoi' => 18,
            'ngaysinh' => '2008-01-01',
        ]);

        $response->assertOk();
        $response->assertSee('Code xử lý lưu thông tin học sinh');
    }

    public function test_sv_form_can_be_displayed(): void
    {
        $response = $this->get('/sv');

        $response->assertOk();
        $response->assertSee('NHẬP THÔNG TIN SINH VIÊN');
    }

    public function test_sv_form_validates_required_fields(): void
    {
        $response = $this->from('/sv')->post('/sv', []);

        $response->assertRedirect('/sv');
        $response->assertSessionHasErrors(['masv', 'hoten', 'tuoi', 'ngaysinh', 'cmnd', 'email']);
    }

    public function test_sv_form_accepts_valid_data(): void
    {
        $response = $this->post('/sv', [
            'masv' => 'PS12345',
            'hoten' => 'Tran Thi B',
            'tuoi' => 20,
            'ngaysinh' => '01/01/2006',
            'cmnd' => '123456789',
            'email' => 'tranthib@fpt.edu.vn',
        ]);

        $response->assertOk();
        $response->assertSee('Code xử lý lưu thông tin sinh viên');
    }

    public function test_guimail_route_sends_mailgun_mailable(): void
    {
        config([
            'services.mailgun.domain' => 'sandbox.example.mailgun.org',
            'services.mailgun.secret' => 'key-test',
        ]);

        Mail::fake();

        $response = $this->get('/guimail');

        $response->assertOk();
        $response->assertSee('Đã gửi email bằng Mailgun.');
        Mail::assertSent(GuiMail::class);
    }
}
