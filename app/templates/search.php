<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />   <!-- <link rel="stylesheet" href="/static/bootstrap.min.css"> -->
  <link rel="stylesheet" href="/static/main.css">
  <script src="https://d3js.org/d3.v5.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Karla" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Archivo" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<body>
  <!-- <form class="form-inline global-search"> -->
  <div class="container">
    <svg class="total" width = "100%" height="680">
      <svg id="pink_section" width="50%" height ="680" x="25%">
        <rect id="rectangle" x="0" y="0" width="100%" height="680"style="fill:#FFF5ED" rx="20" ry="20" />
        <foreignObject id="condition_radio" width="100%" height="100%" x="20%" y="185">
          <form method="get">
            <input type = "hidden" name = "past" value = "{{mate}}" />
            <input type = "hidden" name = "past2" value = "{{check}}" />
            <div id="condition_radios">
              <label style="font-family:Roboto;fill:gray;margin-left:15%;">
                <span class="radio">
                  <input class="inputs" type="radio" name="condition" value="new" {% if condition =="new" %} checked='checked' {% endif %} required>
                  <span class="radio-value" aria-hidden="true"></span>
                </span>
                newer
              </label>
              <label style="font-family:Roboto;margin-left:10%;">
                <span class="radio">
                  <input class="inputs" type="radio" name="condition" value="old" {% if condition =="old" %} checked='checked' {% endif %}>
                  <span class="radio-value" aria-hidden="true"></span>
                </span>
                older
              </label>
            </div>
            <div id="budget_options" class="custom-select" style="width:200px;">
              <select name="budgets" required>
                <option value="">Select a Budget</option>
                <option value="1">$0-$199</option>
                <option value="2">$200-$399</option>
                <option value="3">$400-$599</option>
                <option value="4">$600-$799</option>
                <option value="5">$800-$999</option>
                <option value="6">$1000-$1199</option>
                <option value="7">$1200+</option>
              </select>
            </div>
            <div id="feature_options" style="width:500px;text-align:center">
              <table>
                <tr>
                  <td>Thinness</td>
                  <td>Dual SIM</td>
                  <td>Size</td>
                  <td>CPU</td>
                  <td>PPI</td>
                  <td>SD Slot</td>
                </tr>
                <tr>
              <td><label class="container">
                <input name="feature" type="checkbox" value="thickness">
                <span class="checkmark"></span>
              </label></td>
              <td><label class="container">
                <input name="feature" type="checkbox" value="sim">
                <span class="checkmark"></span>
              </label></td>
              <td><label class="container">
                <input name="feature" type="checkbox" value="size">
                <span class="checkmark"></span>
              </label></td>
              <td><label class="container">
                <input name="feature" type="checkbox" value="cpu">
                <span class="checkmark"></span>
              </label></td>
              <td><label class="container">
                <input name="feature" type="checkbox" value="ppi">
                <span class="checkmark"></span>
              </label></td>
              <td><label class="container">
                <input name="feature" type="checkbox" value="card slot">
                <span class="checkmark"></span>
              </label></td>

            </tr><tr>
              <td>Rear Camera</td>
              <td>Video Qual.</td>
              <td>AUX</td>
              <td>Dual Cam</td>
              <td>Front Cam</td>
              <td>RAM</td>
            </tr>
            <td><label class="container">
                <input name="feature" type="checkbox" value="rear camera">
                <span class="checkmark"></span>
              </label></td>
              <td><label class="container">
                <input name="feature" type="checkbox" value="video">
                <span class="checkmark"></span>
              </label></td>
              <td><label class="container">
                <input name="feature" type="checkbox" value="3.5mm jack">
                <span class="checkmark"></span>
              </label></td>
              <td><label class="container">
                <input name="feature" type="checkbox" value="dual">
                <span class="checkmark"></span>
              </label></td>
              <td><label class="container">
                <input name="feature" type="checkbox" value="front camera">
                <span class="checkmark"></span>
              </label></td>
              <td><label class="container">
                <input name="feature" type="checkbox" value="ram">
                <span class="checkmark"></span>
              </label></td>
            </tr>
            <tr> <td>Internal Storage</td>
            </tr>
            <tr>
              <td><label class="container">
                <input name="feature" type="checkbox" value="storage">
                <span class="checkmark"></span>
              </label></td>
            </tr>
          </table>
            </div>
            <script>
            var x, i, j, selElmnt, a, b, c;
            /*look for any elements with the class "custom-select":*/
            x = document.getElementsByClassName("custom-select");
            for (i = 0; i < x.length; i++) {
              selElmnt = x[i].getElementsByTagName("select")[0];
              /*for each element, create a new DIV that will act as the selected item:*/
              a = document.createElement("DIV");
              a.setAttribute("class", "select-selected");
              a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
              x[i].appendChild(a);
              /*for each element, create a new DIV that will contain the option list:*/
              b = document.createElement("DIV");
              b.setAttribute("class", "select-items select-hide");
              for (j = 1; j < selElmnt.length; j++) {
                /*for each option in the original select element,
                create a new DIV that will act as an option item:*/
                c = document.createElement("DIV");
                c.innerHTML = selElmnt.options[j].innerHTML;
                c.addEventListener("click", function(e) {
                  /*when an item is clicked, update the original select box,
                  and the selected item:*/
                  var y, i, k, s, h;
                  s = this.parentNode.parentNode.getElementsByTagName("select")[0];
                  h = this.parentNode.previousSibling;
                  for (i = 0; i < s.length; i++) {
                    if (s.options[i].innerHTML == this.innerHTML) {
                      s.selectedIndex = i;
                      h.innerHTML = this.innerHTML;
                      y = this.parentNode.getElementsByClassName("same-as-selected");
                      for (k = 0; k < y.length; k++) {
                        y[k].removeAttribute("class");
                      }
                      this.setAttribute("class", "same-as-selected");
                      break;
                    }
                  }
                  h.click();
                });
                b.appendChild(c);
              }
              x[i].appendChild(b);
              a.addEventListener("click", function(e) {
                /*when the select box is clicked, close any other select boxes,
                and open/close the current select box:*/
                e.stopPropagation();
                closeAllSelect(this);
                this.nextSibling.classList.toggle("select-hide");
                this.classList.toggle("select-arrow-active");
              });
            }
            function closeAllSelect(elmnt) {
              /*a function that will close all select boxes in the document,
              except the current select box:*/
              var x, y, i, arrNo = [];
              x = document.getElementsByClassName("select-items");
              y = document.getElementsByClassName("select-selected");
              for (i = 0; i < y.length; i++) {
                if (elmnt == y[i]) {
                  arrNo.push(i)
                } else {
                  y[i].classList.remove("select-arrow-active");
                }
              }
              for (i = 0; i < x.length; i++) {
                if (arrNo.indexOf(i)) {
                  x[i].classList.add("select-hide");
                }
              }
            }
            /*if the user clicks anywhere outside the select box,
            then close all select boxes:*/
            document.addEventListener("click", closeAllSelect);
            </script>
            <button id="button_svg" width="100%" height="100%" type="submit" class="button">Submit</button>
          </form>
        </foreignObject>
      </svg>
      <svg id ="blue_section" width="0" height="680" x="38%">
        <rect id="blue_rectangle" x="0" y="0" width="0" height="680"style="fill:#F1F7FF" rx="20" ry="20" />

      </svg>
    </svg>

    <!-- {% if data %}
    <meta id="my-data" data-playlist="{{ data }}">
    <h1>{{data}}</h1>
    {% endif %} -->
  </div>
  <script>
  let get_request = 0;
  let clicked = 0;
  function setup(){
    let svg = d3.select("#pink_section")
    let height = svg.attr("height");
    let width = svg.attr("width");


    svg.append("g")
    .append("text")
    .text("sellPhones")
    .attr("class","svg_text")
    .attr("font-family", "Roboto")
    .attr("font-size", "55px")
    .attr("fill","gray")
    .attr("text-anchor","middle")
    .attr("dominantBaseline","middle")
    .attr("x",width)
    .attr("y",90);



    svg.append("g")
    .append("text")
    .text("condition")
    .attr("id","condition")
    .attr("font-style","italic")
    .attr("font-family", "Roboto")
    .attr("font-size","20px")
    .attr("textLength","86px")
    .attr("fill","gray")
    .attr("text-anchor","middle")
    .attr("dominantBaseline","middle")
    .attr("x",width)
    .attr("y",165);

    svg.append("g")
    .append("line")
    .attr("class","line")
    .attr("x1","4%")
    .attr("x2","42%")
    .attr("y1","160")
    .attr("y2","160")
    .attr("stroke","gray")
    .attr("stroke-linecap","round");

    svg.append("g")
    .append("line")
    .attr("class","line2")
    .attr("x1","58%")
    .attr("x2","96%")
    .attr("y1","160")
    .attr("y2","160")
    .attr("stroke","gray")
    .attr("stroke-linecap","round");

    svg.append("g")
    .append("text")
    .text("budget")
    .attr("id","budget")
    .attr("font-style","italic")
    .attr("font-family", "Roboto")
    .attr("font-size","20px")
    .attr("fill","gray")
    .attr("text-anchor","middle")
    .attr("dominantBaseline","middle")
    .attr("x",width)
    .attr("y",250);

    svg.append("g")
    .append("line")
    .attr("class","line")
    .attr("x1","4%")
    .attr("x2","42%")
    .attr("y1","245")
    .attr("y2","245")
    .attr("stroke","gray")
    .attr("stroke-linecap","round");

    svg.append("g")
    .append("line")
    .attr("class","line2")
    .attr("x1","58%")
    .attr("x2","96%")
    .attr("y1","245")
    .attr("y2","245")
    .attr("stroke","gray")
    .attr("stroke-linecap","round");

    svg.append("g")
    .append("text")
    .text("features")
    .attr("id","features")
    .attr("font-style","italic")
    .attr("font-family", "Roboto")
    .attr("font-size","20px")
    .attr("fill","gray")
    .attr("text-anchor","middle")
    .attr("dominantBaseline","middle")
    .attr("x",width)
    .attr("y",350);

    svg.append("g")
    .append("line")
    .attr("class","line")
    .attr("x1","4%")
    .attr("x2","42%")
    .attr("y1","345")
    .attr("y2","345")
    .attr("stroke","gray")
    .attr("stroke-linecap","round");

    svg.append("g")
    .append("line")
    .attr("class","line2")
    .attr("x1","58%")
    .attr("x2","96%")
    .attr("y1","345")
    .attr("y2","345")
    .attr("stroke","gray")
    .attr("stroke-linecap","round");
  }

  function fill_blue(){
    let svg = d3.select("#blue_section")
    let height = svg.attr("height");
    let width = svg.attr("width");

    svg.append("g")
    .append("text")
    .text("Search Results")
    .attr("id","search_results")
    .attr("font-family", "Roboto")
    .attr("font-style","italic")
    .attr("font-size", "30px")
    .attr("fill","gray")
    .style("opacity",0)
    .attr("text-anchor","middle")
    .attr("dominantBaseline","middle")
    .attr("x","50%")
    .attr("y",90);

    d3.select("#search_results")
    .transition()
    .style("opacity",1)
    .delay(100);

    svg.append("g")
    .append("line")
    .attr("class","line")
    .attr("x1","4%")
    .attr("x2","96%")
    .attr("y1","110")
    .attr("y2","110")
    .attr("stroke","gray")
    .attr("stroke-linecap","round");
  }

  function move_svg(){

    d3.select("#feature_options")
        .transition()
        .duration(300)
        .style("width", 400 + 'px');

    d3.select(".line2")
    .transition()
    .duration(300)
    .attr("x1","60%");

    d3.select(".line")
    .transition()
    .duration(300)
    .attr("x2","40%");

    d3.select("#pink_section")
    .transition()
    .duration(300)
    .attr("width", "35%")
    .attr("x","0");

    d3.select("#blue_section")
    .transition()
    .duration(300)
    .attr("width", "62%");

    d3.select("#blue_rectangle")
    .transition()
    .duration(300)
    .attr("width", "100%");

    d3.select("#condition_radio")
    .transition()
    .duration(300)
    .attr("x", "15%");

    names = {{names | tojson}};
    urls = {{urls | tojson}};

    if(names.length > 0){
      for(let i = 0; i < Math.min(6,names.length); i++){
        d3.select("#blue_section").append('text')
          .attr("class","image_text")
          .text(i+1 + ") " + names[i])
          .attr("font-family", "Roboto")
          .attr("font-size", "16px")
          .attr("fill","gray")
          .style("opacity",0)
          .attr("x",i%3*30+5 + "%")
          .attr("y",Math.floor((i/3))%2*40+20 + "%");

        d3.select("#blue_section").append('image')
          .attr("class","image_text")
          .attr('xlink:href', urls[i])
          .attr('width', 200)
          .attr('height', 200)
          .style("opacity",0)
          .attr('x', i%3*30+10 + "%")
          .attr('y', Math.floor((i/3))%2*40+25 + "%");
      }
      d3.selectAll(".image_text")
      .transition()
      .style("opacity",1)
      .delay(300);




    }




    clicked = 1;
    setTimeout(function() { fill_blue(); }, 300);
    return false;

  }

  function fast_move_svg(){

    d3.select("#feature_options")
        .style("width", 400 + 'px');

    d3.select(".line2")
    .attr("x1","60%");

    d3.select(".line")
    .attr("x2","40%");

    d3.select("#pink_section")
    .attr("width", "35%")
    .attr("x","0");

    d3.select("#blue_section")
    .attr("width", "62%");

    d3.select("#blue_rectangle")
    .attr("width", "100%");

    d3.select("#condition_radio")
    .attr("x", "15%");

    names = {{names | tojson}};
    urls = {{urls | tojson}};

    if(names.length > 0){
      for(let i = 0; i < Math.min(6,names.length); i++){
        d3.select("#blue_section").append('text')
          .attr("class","image_text")
          .text(i+1 + ") " + names[i])
          .attr("font-family", "Roboto")
          .attr("font-size", "16px")
          .attr("fill","gray")
          .style("opacity",0)
          .attr("x",i%3*30+5 + "%")
          .attr("y",Math.floor((i/3))%2*40+20 + "%");

        d3.select("#blue_section").append('image')
          .attr("class","image_text")
          .attr('xlink:href', urls[i])
          .attr('width', 200)
          .attr('height', 200)
          .style("opacity",0)
          .attr('x', i%3*30+10 + "%")
          .attr('y', Math.floor((i/3))%2*40+25 + "%");
      }
    }
    d3.selectAll(".image_text")
    .transition()
    .style("opacity",1)
    .delay(300);

    clicked = 1;
    setTimeout(function() { fill_blue(); }, 300);
    return false;

  }
  if("{{check}}" === "True" && "{{flag}}" === "True"){
    setup();
    fast_move_svg();
  }
  else if ("{{check}}" === "True"){
    setup();
    move_svg();
  }else{
    setup();
    if("{{condition}}" == "new" || "{{condition}}" == "old" ){
      console.log("{{condition}}");
      move_svg();
    }
  }





</script>
</body>

</html>
