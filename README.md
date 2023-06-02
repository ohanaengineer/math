# How to use -使い方- <!-- omit in toc -->
それぞれのクラスをインスタンス化して、exec(各引数)で主処理を呼び出します。
calc() の引数、返す値はクラスによるので、詳しくは各クラスのドキュメントを参照してください。

```
・使用例
<?php
use Math\Zeller;

echo (new Zeller)->calc(2022,4,14)->h;
```

# 目次 <!-- omit in toc -->
- [d](#d)
  - [1. Decimal 進数変換](#1-decimal-進数変換)
    - [calc](#calc)
- [h](#h)
  - [Heron ヘロンの公式](#heron-ヘロンの公式)
    - [calc](#calc-1)
- [t](#t)
  - [Triangle 三角関数](#triangle-三角関数)
    - [calc](#calc-2)
- [p](#p)
  - [Prime 素数判定](#prime-素数判定)
    - [calc](#calc-3)
- [z](#z)
  - [1. Zeller ツェラーの公式](#1-zeller-ツェラーの公式)
    - [calc](#calc-4)
    - [getDate](#getdate)

# d
## 1. Decimal 進数変換
n進数の任意の数値、文字からm進数に変換します
### calc
1. 引数 val(変換値) ,to(変換先のm進数),from(変換元のn進数)
2. 初期値はto:2進数、from:10進数です
3. 戻り値 ->calc(v,t,f) : 変換後の数値・文字列

# h
## Heron ヘロンの公式
### calc
1. 引数 辺a,b,c
2. 戻り値 ->calc(a,b,c) : $this
3. 戻り値 ->surface : 面積
4. 戻り値 ->angles : 各角度[A,B,C]の順に格納されています
5. 戻り値 ->high : 角[A,B,C]から対辺[a,b,c]への高さ[a,b,c]

# t
## Triangle 三角関数
### calc
1. 引数 辺a,b,c
2. 戻り値 ->calc(a,b,c) : $this
3. 戻り値 ->A,->B,->C : 各A,B,Cの角度
4. 戻り値 ->getCos(角) : 各conの値
5. 戻り値 ->getSin(角) : 各sinの値
6. 戻り値 ->getTan(角) : 各tanの値
7. 戻り値 ->getRad(角) : 各ラジアンの値

# p
## Prime 素数判定
### calc
1.引数 n : 2以上の自然数
2.戻り値 ->calc(n) : bool nが素数か否か

# z
## 1. Zeller ツェラーの公式
y年 m月 d日 の値から、曜日を返します。
### calc
1. 引数 y (年) ,m (月) ,d (日)
2. 戻り値 ->calc(y,m,d) : $this
3. 戻り値 ->h : 曜日の値
### getDate
1. 引数 locale (出力言語)
2. ->getDate(locale) : 言語ごとの曜日
