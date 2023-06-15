# How to use -使い方- <!-- omit in toc -->
それぞれのクラスをインスタンス化して、exec(各引数)で主処理を呼び出します。  
calc() の引数、返す値はクラスによるので、詳しくは各クラスのドキュメントを参照してください。  
- 2023/6/3 仕様変更
calc() は全て$thisを返します。  
主処理の結果を取得する場合はgetクラス名( getHeron など)で取得してください。  
また、動的プロパティは全てprivateに変更したため、クラス内の動的プロパティは全てfunctionを利用して取得してください。 
```
・使用例
<?php
use Math\Zeller;

echo (new Zeller)->calc(2022,4,14)->getZeller();
```

# 目次 <!-- omit in toc -->
- [d](#d)
- [1. Decimal 進数変換](#1-decimal-進数変換)
  - [calc](#calc)
  - [getDecimal](#getdecimal)
- [h](#h)
- [1.　Heron ヘロンの公式](#1heron-ヘロンの公式)
  - [calc](#calc-1)
  - [getHeron](#getheron)
  - [getAngle](#getangle)
  - [getHigh](#gethigh)
- [t](#t)
- [1. Triangle 三角関数](#1-triangle-三角関数)
  - [calc](#calc-2)
  - [getTriangle](#gettriangle)
  - [getRad](#getrad)
  - [getCos](#getcos)
  - [getSin](#getsin)
  - [getTan](#gettan)
- [p](#p)
- [1. Prime 素数判定](#1-prime-素数判定)
  - [calc](#calc-3)
  - [getPrime](#getprime)
- [z](#z)
- [1. Zeller ツェラーの公式](#1-zeller-ツェラーの公式)
  - [calc](#calc-4)
  - [getZeller](#getzeller)
  - [getDate(今のところ日本語のみ対応)](#getdate今のところ日本語のみ対応)

# d
# 1. Decimal 進数変換
n進数の任意の数値、文字からm進数に変換します
## calc
- 引数 1.val(変換値) 2:to(変換先のm進数) 3.from(変換元のn進数)
  - to 初期値 2(進数)
  - from 初期値 10(進数)
## getDecimal
- 戻り値 : 変換後の数値・文字列

# h
# 1.　Heron ヘロンの公式
## calc
- 引数 : 1.辺a 2.辺b 3.辺c
## getHeron
- 戻り値 : 3辺から求められる面積
## getAngle
- 引数 : 角(選択肢はA,B,Cのいずれか)
- 戻り値 : 各角の角度
## getHigh
- 引数 : 角(A,B,C) もしくは辺(a,b,c)
- 戻り値 : A,B,Cから対角 もしくは辺a,b,cから対辺までの高さ

# t
# 1. Triangle 三角関数
## calc
- 引数 : 1.辺a 2.辺b 3.辺c
## getTriangle
- 引数 : 角(A,B,C)
- 戻り値 : 角 A,B,Cの角度(弧度法)
## getRad
- 引数 : 角(A,B,C)
- 戻り値 : 角 A,B,Cの角度(ラジアン法)
## getCos
- 引数 : 角(A,B,C)
- 戻り値 : 各conの値
## getSin
- 引数 : 角(A,B,C)
- 戻り値 : 各sinの値
## getTan
- 引数 : 角(A,B,C)
- 戻り値 : 各tanの値
  - ただし、角A,B,Cが90の倍数角の場合はException

# p
# 1. Prime 素数判定
## calc
- 引数 : n (2以上の自然数)
## getPrime
- 引数 : なし
- 戻り値 : bool (nが素数か否か)

# z
# 1. Zeller ツェラーの公式
y年 m月 d日 の値から、曜日を返します。
## calc
- 引数 1.y(年) 2.m (月) 3.d (日)
## getZeller
- 引数 : なし
- 戻り値 : 曜日の値
  - 0:土 1:日 2:月 3:火 4:水 5:木 6:金
## getDate(今のところ日本語のみ対応)
- 引数 : locale (出力言語)
  - 初期値 ja(日本語)
- 戻り値 : 言語ごとの曜日
