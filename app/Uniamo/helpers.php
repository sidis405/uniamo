<?php

function flattenRelatedForNews($categories, $tags)
{
    $categories = json_decode(json_encode($categories), true);
    $tags = json_decode(json_encode($tags), true);

    $raw = array_merge($categories, $tags);

    $temp = [];
    $out = [];

    foreach ($raw as $news) {
        $temp[$news['id']][] = $news;
    }

    foreach ($temp as $news) {
        $info = $news[0];
        unset($info['category']);
        unset($info['tag']);
        unset($info['tag_slug']);
        unset($info['category_slug']);
        $info['relevance'] = 0;

        foreach($news as $item)
        {
            if(isset($item['category']))
            {
                $current_item = [
                    'category' => $item['category'],
                    'slug' => $item['category_slug']
                ];
                $info['matches']['categories'][] = $current_item;

            }else{

                 $current_item = [
                    'tag' => $item['tag'],
                    'slug' => $item['tag_slug']
                ];
                $info['matches']['tags'][] = $current_item;

            }

            $info['relevance']++;
        }

        $out[] = $info;
        
    }

    $final = [];
        foreach ($out as $key => $row)
        {
            $final[$key] = $row['relevance'];
        }
        array_multisort($final, SORT_DESC, $out);


    return $out;

}

function flattenRelatedForPages($categories, $tags)
{
    $categories = json_decode(json_encode($categories), true);
    $tags = json_decode(json_encode($tags), true);

    $raw = array_merge($categories, $tags);

    $temp = [];
    $out = [];

    foreach ($raw as $news) {
        $temp[$news['id']][] = $news;
    }

    // return $temp;

    foreach ($temp as $news) {
        $info = $news[0];
        unset($info['body']);
        unset($info['pivot']);
        unset($info['categories']);
        unset($info['tags']);
        unset($info['user_id']);
        unset($info['created_at']);
        unset($info['updated_at']);
        unset($info['active']);
        $info['relevance'] = 0;

        // return $news;
        foreach($news as $item)
        {
            if(isset($item['categories']))
            {
                foreach($item['categories'] as $category){
                    $current_item = [
                        'category' => $category['category'],
                        'slug' => $category['slug']
                    ];
                    $info['matches']['categories'][] = $current_item;
                }

            }else{

                foreach($item['tags'] as $tag){
                     $current_item = [
                        'tag' => $tag['tag'],
                        'slug' => $tag['slug']
                    ];
                    $info['matches']['tags'][] = $current_item;
                }   

            }

            $info['relevance']++;
        }

        $out[] = $info;
        
    }

    $final = [];
        foreach ($out as $key => $row)
        {
            $final[$key] = $row['relevance'];

        }
        array_multisort($final, SORT_DESC, $out);


    return $out;

}