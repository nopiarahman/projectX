<?php
use Carbon\Carbon;
function greetings(){
    $now = Carbon::now()->hour;
    if($now <4){
        return "Waktunya Tidur";
    }elseif($now <9){
        return "Selamat Pagi";
    }elseif($now <14){
        return "Selamat Siang";
    }elseif($now <17){
        return "Selamat Sore";
    }elseif($now <24){
        return "Selamat Malam";
    }
}
function pesan(){
    $now = Carbon::now()->hour;
    if($now <4){
        return "Begadang gak baik untuk kesehatan loh!";
    }elseif($now <9){
        return "Bismillah, Semangat kakak";
    }elseif($now <11){
        return "Jangan lupa Doa, Kalau capek istirahat dulu ya";
    }elseif($now <12){
        return "Alhamdulillah, bentar lagi makan siang, ";
    }elseif($now <13){
        return "Sudah Sholat dan istirahat?. Yuk lanjut";
    }elseif($now <17){
        return "Semoga Allah ganti lelahnya dengan pahala, Aamiin";
    }elseif($now <22){
        return "Sudah malem masih keinget aku? Maa Syaa Allah";
    }elseif($now <=24){
        return "Begadang gak baik untuk kesehatan loh!";
    }
}