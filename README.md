# How to use -使い方- <!-- omit in toc -->
それぞれのクラスをインスタンス化して、exec(各引数)で主処理を呼び出します。  
set() の引数、返す値はクラスによるので、詳しくは各クラスのドキュメントを参照してください。  
- 2023/6/3 仕様変更
set() は全て$thisを返します。  
主処理の結果を取得する場合はgetクラス名( getHeron など)で取得してください。  
また、動的プロパティは全てprivateに変更したため、クラス内の動的プロパティは全てfunctionを利用して取得してください。 
```
・使用例
<?php
use Math\Zeller;

echo (new Zeller)->set(2022,4,14)->getZeller();
```

# 目次 <!-- omit in toc -->
- [D](#d)
- [1. Decimal 進数変換](#1-decimal-進数変換)
  - [set](#set)
  - [getDecimal](#getdecimal)
- [E](#e)
- [1.Eratosthenes エラトステネスん篩](#1eratosthenes-エラトステネスん篩)
  - [set](#set-1)
  - [getEratosthenes](#geteratosthenes)
- [H](#h)
- [1.　Heron ヘロンの公式](#1heron-ヘロンの公式)
  - [set](#set-2)
  - [getHeron](#getheron)
  - [getAngle](#getangle)
  - [getHigh](#gethigh)
- [2. Holiday 年間休日算出](#2-holiday-年間休日算出)
  - [set](#set-3)
  - [getHoliday](#getholiday)
- [I](#i)
- [1. Interest 利息計算](#1-interest-利息計算)
  - [set](#set-4)
  - [getInterest](#getinterest)
  - [getHistory](#gethistory)
- [T](#t)
- [1. Triangle 三角関数](#1-triangle-三角関数)
  - [set](#set-5)
  - [getTriangle](#gettriangle)
  - [getRad](#getrad)
  - [getCos](#getcos)
  - [getSin](#getsin)
  - [getTan](#gettan)
- [P](#p)
- [1. Prime 素数判定](#1-prime-素数判定)
  - [set](#set-6)
  - [getPrime](#getprime)
- [R](#r)
- [1. Root 冪乗根](#1-root-冪乗根)
  - [set](#set-7)
  - [getRoot](#getroot)
- [Z](#z)
- [1. Zeller ツェラーの公式](#1-zeller-ツェラーの公式)
  - [set](#set-8)
  - [getZeller](#getzeller)
  - [getDate(今のところ日本語のみ対応)](#getdate今のところ日本語のみ対応)

# D
# 1. Decimal 進数変換
n進数の任意の数値、文字からm進数に変換します
## set
- 引数 1.val(変換値) 2:to(変換先のm進数) 3.from(変換元のn進数)
  - to 初期値 2(進数)
  - from 初期値 10(進数)
## getDecimal
- 引数 : なし
- 戻り値 : 変換後の数値・文字列

# E
# 1.Eratosthenes エラトステネスん篩
## set
- 引数 : 自然数
## getEratosthenes
- 引数 : なし
- 戻り値 : セットした自然数までの間に存在する素数配列

# H
# 1.　Heron ヘロンの公式
## set
- 引数 : 1.辺a 2.辺b 3.辺c
## getHeron
- 引数 : なし
- 戻り値 : 3辺から求められる面積
## getAngle
- 引数 : 角(選択肢はA,B,Cのいずれか)
- 戻り値 : 各角の角度
## getHigh
- 引数 : 角(A,B,C) もしくは辺(a,b,c)
- 戻り値 : A,B,Cから対角 もしくは辺a,b,cから対辺までの高さ

# 2. Holiday 年間休日算出
## set
- 引数 
  1.年月日[$year,$month,$day]  
  2.休みの曜日[土,日,月,火,水,木,金,祝] = [0,1,2,3,4,5,6,7]  
  3.祝日以外の、会社規定休日 yyyy-mm-dd形式  
  4.会社規定に指定できない、自由取得可能な日数  
## getHoliday
- 引数 : なし
- 戻り値 : 指定した条件から算出した休日日数

# I
# 1. Interest 利息計算
## set
- 引数 1.年数 2.元本 3.利率
## getInterest
- 引数 1.true:単利 false:複利
- 戻り値 元本・金利・年数で計算した値
## getHistory
- 引数 1.true:単利 false:複利
- 戻り値 1年目から、年数までの元本推移

# T
# 1. Triangle 三角関数
## set
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

# P
# 1. Prime 素数判定
## set
- 引数 : n (2以上の自然数)
## getPrime
- 引数 : なし
- 戻り値 : bool (nが素数か否か)

# R
# 1. Root 冪乗根
## set
- 引数 : 1.n 2.x (nのx乗根 としたとき)
## getRoot
- 引数 : なし
- 戻り値 : nのx乗根の値

# Z
# 1. Zeller ツェラーの公式
y年 m月 d日 の値から、曜日を返します。
## set
- 引数 1.y(年) 2.m (月) 3.d (日)
## getZeller
- 引数 : なし
- 戻り値 : 曜日の値
  - 0:土 1:日 2:月 3:火 4:水 5:木 6:金
## getDate(今のところ日本語のみ対応)
- 引数 : locale (出力言語)
  - 初期値 ja(日本語)
- 戻り値 : 言語ごとの曜日
