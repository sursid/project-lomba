<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Story;
use App\Models\User;
use Illuminate\Support\Str;

class StoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Data dummy stories
        $storiesData = [
            [
                'username' => 'petani_muda',
                'media_path' => 'stories/pertanian-padi.jpg',
                'type' => 'image',
                'caption' => 'Panen padi musim ini sangat melimpah! 🌾'
            ],
            [
                'username' => 'kebun_organik',
                'media_path' => 'stories/sayur-hidroponik.jpg',
                'type' => 'image', 
                'caption' => 'Kebun hidroponik yang baru saja kami kembangkan'
            ],
            [
                'username' => 'ternak_sejahtera',
                'media_path' => 'stories/ternak-sapi.jpg',
                'type' => 'image',
                'caption' => 'Sapinya sehat dan produktif! 🐄'
            ],
            [
                'username' => 'nelayan_pantai',
                'media_path' => 'stories/tangkapan-ikan.mp4',
                'type' => 'video',
                'caption' => 'Hasil tangkapan hari ini luar biasa!'
            ],
            [
                'username' => 'kebun_kopi',
                'media_path' => 'stories/proses-kopi.jpg',
                'type' => 'image',
                'caption' => 'Proses pengolahan biji kopi dari kebun kami'
            ],
            [
                'username' => 'petani_jagung',
                'media_path' => 'stories/ladang-jagung.jpg',
                'type' => 'image',
                'caption' => 'Jagung siap panen! Hasil yang membanggakan 🌽'
            ],
            [
                'username' => 'budidaya_ikan',
                'media_path' => 'stories/kolam-ikan.mp4',
                'type' => 'video',
                'caption' => 'Sistem budidaya ikan modern kami'
            ],
            [
                'username' => 'perkebunan_sawit',
                'media_path' => 'stories/kebun-sawit.jpg',
                'type' => 'image',
                'caption' => 'Perkebunan sawit yang luas dan terawat'
            ],
            [
                'username' => 'peternakan_ayam',
                'media_path' => 'stories/kandang-ayam.jpg',
                'type' => 'image',
                'caption' => 'Peternakan ayam dengan standar kesehatan tinggi'
            ],
            [
                'username' => 'petani_coklat',
                'media_path' => 'stories/pohon-coklat.mp4',
                'type' => 'video',
                'caption' => 'Proses pemeliharaan pohon coklat dari dekat'
            ]
        ];

        // Proses seeder
        foreach ($storiesData as $storyData) {
            // Cari atau buat user
            $user = User::firstOrCreate(
                ['username' => $storyData['username']],
                [
                    'name' => ucwords(str_replace('_', ' ', $storyData['username'])),
                    'email' => Str::slug($storyData['username']) . '@nusatani.com',
                    'password' => bcrypt('password123'),
                    'role' => 'member'
                ]
            );

            // Hapus story lama jika ada
            Story::where('user_id', $user->id)->delete();

            // Buat story baru
            Story::create([
                'user_id' => $user->id,
                'type' => $storyData['type'],
                'media_path' => $storyData['media_path'],
                'caption' => $storyData['caption'],
                'is_active' => true,
                'expires_at' => now()->addHours(24)
            ]);
        }
    }
}