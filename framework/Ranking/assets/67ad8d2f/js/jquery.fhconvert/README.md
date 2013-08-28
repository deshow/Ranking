## jquery.fhconvert.js
[distraid Inc様のfhconvert.js](http://distraid.co.jp/demo/js_codeconv.html)のラッププラグインです。

半角全角相互変換、 カタカナひらがな相互変換等を行うjQuery Pluginです。

## 基本的な使い方

変換タイプはdata属性を見ますので、対象inputにdata属性(data-fhconvert)を指定してください。

    <input class="fhconvert" type="text" data-fhconvert='htof' />

上記のようにdata属性を指定した上でfocusoutイベント等に割り当ててください。

    $('.fhconvert').focusout(function() {
        $(this).fhconvert();
    });

## 複数の変換タイプの指定
カタカナ指定フィールドでは、「ひらがなをカナに変換」にくわえて「半角カナを全角カナに変換」と複数の変換タイプを指定したい場合があると思います。
その場合は以下のように配列で指定してください。

    <input class="fhconvert" type="text" data-fhconvert='["hkktofkk", "hgtokk"]' />

## スペースは全角にしない等のオプションを指定する場合。
distraid Inc様のfhconvert.jsにはスペースは全角にしない等の素敵オプションがあります。  
このjQuery Pluginでもそれはそのまま踏襲させて貰っています。

オプションを指定する場合は、data-fhconvertでの指定をオブジェクト型で指定してください。  

オブジェクトの指定方法  
**type**: 変換するタイプを指定してください。  
**option**: fhconvertに引き渡すオプションを指定してください。(詳細はfhconvert.jsのソースをご覧下さい。。)

    <input class="fhconvert" type="text" data-fhconvert='{"type": "htof", "option": {"space":false}}' />

optionの内容はfhconvert.jsにそのまま渡しているので、fhconvert.jsに完全依存しています。

## 諸事情によりinputにdata属性を指定できない場合のTips
INPUT属性をカスタマイズできないCMSを利用している等の諸事情でinputにdata属性を指定できない場合もあるかと思います。
その場合は、下記のようにdata属性をinputにコピーする事によりご利用頂けるかと思います。

    HTMLの例)
    <div class="fhconvert" data-fhconvert="hgtokk">
    <input type="text" />
    </div>

    呼び出すJS
    $('.fhconvert').each(function() {
        var $this = $(this);
        if($this[0].tagName !== 'INPUT') {
            //inputでない場合は、inputにデータ属性をコピーする
            $input = $this.find('input');
            $input.data('fhconvert', $this.data('fhconvert'));

            $input.focusout(function() {
                $(this).fhconvert();
            });
        }
    });


このあたりは、sample.htmlにも記載しているのでご確認下さい。

## 変換タイプ
data-fhconvertで指定する場合は、以下のように指定してください。(fhconvert.jsに完全依存です。)

    ftoh: 全角英数字→半角
    htof: 半角英数字→全角
    kktohg: 全角カタカナ→ひらがな
    hgtokk: ひらがな→全角カタカナ
    hkktofkk: 半角ｶﾅ→全角カナ
