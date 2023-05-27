# How to use -使い方- <!-- omit in toc -->
それぞれのクラスをインスタンス化して、exec(各引数)で主処理を呼び出します。
exec() の引数、返す値はクラスによるので、詳しくは各クラスのドキュメントを参照してください。

```
・使用例
<?php
use Math\Zeller;

echo (new Zeller)->exec(2022,4,14)->h;
```

# 目次 <!-- omit in toc -->
- [d](#d)
  - [1. Decimal 進数変換](#1-decimal-進数変換)
- [z](#z)
  - [1. Zeller ツェラーの公式](#1-zeller-ツェラーの公式)
    - [exec](#exec)
    - [getDate](#getdate)

# d
## 1. Decimal 進数変換


# z
## 1. Zeller ツェラーの公式
y年 m月 d日 の値から、曜日を返します。
### exec
1. 引数 y (年) ,m (月) ,d (日)
2. 戻り値 ->exec(y,m,d) : $this
3. 戻り値 ->h : 曜日の値
### getDate
1. 引数 locale (出力言語)
2. ->getDate(locale) : 言語ごとの曜日
