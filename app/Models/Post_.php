<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

class Post_
{
    private static $blog_posts = [
        [
            "title" => "Judul post pertama",
            "slug" => "judul-post-pertama",
            "author" => "Badru Salam",
            "body" => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Id corporis blanditiis perferendis incidunt, modi nesciunt ad voluptate quis quaerat temporibus officia porro consequatur et laudantium earum. Repellendus ratione provident, officiis neque eveniet cupiditate soluta deleniti ducimus doloremque facilis dolorum? Tenetur aliquam, repudiandae aliquid non voluptatum quibusdam ipsum perferendis debitis provident architecto fuga, dolorum ut rem animi unde nisi voluptatem itaque? Ipsam veritatis reprehenderit aperiam tenetur iure repellat mollitia enim, cum nam ut, nostrum hic praesentium. Illo, blanditiis. Itaque, fugit harum. Est officia minima, facere accusamus ducimus voluptas soluta fugit, ut officiis voluptatum aspernatur culpa nobis aliquid natus quos alias dicta?
    "
        ],

        [
            "title" => "Judul post kedua",
            "slug" => "judul-post-kedua",
            "author" => "Badru Salam",
            "body" => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Id corporis blanditiis perferendis incidunt, modi nesciunt ad voluptate quis quaerat temporibus officia porro consequatur et laudantium earum. Repellendus ratione provident, officiis neque eveniet cupiditate soluta deleniti ducimus doloremque facilis dolorum? Tenetur aliquam, repudiandae aliquid non voluptatum quibusdam ipsum perferendis debitis provident architecto fuga, dolorum ut rem animi unde nisi voluptatem itaque? Ipsam veritatis reprehenderit aperiam tenetur iure repellat mollitia enim, cum nam ut, nostrum hic praesentium. Illo, blanditiis. Itaque, fugit harum. Est officia minima, facere accusamus ducimus voluptas soluta fugit, ut officiis voluptatum aspernatur culpa nobis aliquid natus quos alias dicta?
    "
        ]

    ];

    

    public static function all()
    {
        return collect(self::$blog_posts);
    }

    public static function find($slug)
    {
        $posts = static::all();
        // foreach ($posts as $p) {
        //     if ($p['slug'] == $slug) {
        //         $posts = $p;
        //     }
        // }
        return $posts->firstWhere('slug', $slug);
    }

}
