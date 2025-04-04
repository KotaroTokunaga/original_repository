//はじめに、このコードはHTMLフォームが送信される際に、ユーザーネームにスペースが含まれていないかチェックし、もし含まれていればフォーム送信を防ぐもの

document.addEventListener("DOMContentLoaded", function () {
  //この部分は、HTML文書が完全に読み込まれた後に実行されるコードを定義しています。DOMContentLoaded イベントは、ページが完全に読み込まれたことを意味します（画像やスタイルシートの読み込みは完了していなくても、HTMLが完全に読み込まれたタイミング）このイベントリスナー内で、フォームに関連するコードを実行しています。



  document.querySelector("form").addEventListener("submit", function (event) {
    //document.querySelector("form") は、ページ内の最初の < form > 要素を取得します。次に、そのフォームが送信される(submit) 時に実行される処理を定義しています。event はイベントオブジェクトで、フォーム送信イベントに関する情報を持っています。

    const username = document.getElementById("name").value;
    //document.getElementById("name") は、IDが "name" のフォーム要素(今回はregister.blade.php18行目 < input id = "name" >）を取得し、その
    // .value プロパティを使ってユーザーが入力した値を取得しています。

    const regex = /[\u3000\s]/;  // 全角スペースまたは半角スペースを検出

    if (regex.test(username)) {
      alert("ユーザーネームにスペースを含めることはできません。");
      event.preventDefault();  // フォーム送信を防止
    }
  });
});
