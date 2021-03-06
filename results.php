<?php

session_start();
include_once('admin/config/mysql.php');

//get groups
$query = "SELECT DISTINCT(questions_groups.questions_groupid),questions_groups.name 
FROM questions_groups,questions WHERE questions_groups.questions_groupid=questions.questions_groupid AND 
questions_groups.questions_groupid>0";
$query .= " AND questions_groups.usersgroupid=10";    
$query .= " ORDER BY questions_groups.position ASC"; 
$result = @mysql_query ($query);
$questions_groups_tab='';
$i=0;
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {

  $i++;
  foreach ($row as $key => $value) {
    $questions_groups_tab[$row['questions_groupid']][$key]=$value;
  }
  $questions_groups_tab[$row['questions_groupid']]['i']=$i;
}

$query = "SELECT 
questionid,
name,
charter,
extent_header,
usersgroupid,
questions_groupid,
pre_page,
answers_groupid
FROM 
questions WHERE questionid>0";
$query .= " AND usersgroupid=10";   
$query .= " ORDER BY position ASC";   
$result = @mysql_query ($query);
$num_rows = mysql_num_rows($result);

$questions_tab='';
$i=0;
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {

  $i++;
  foreach ($row as $key => $value) {
    $questions_tab[$row['questions_groupid']][$row['questionid']][$key]=$value;
  }
  $questions_tab[$row['questions_groupid']][$row['questionid']]['i']=$i;
}

$query = "SELECT * FROM questionnaries WHERE questionnarieid>0 AND type=10 AND questionnaries.createtime>'2015-02-19 12:30:07'";
$result = @mysql_query ($query);
$num_rows = mysql_num_rows($result);
$questionnaries_i=0;
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
  $questionnaries_i++;
}

//get answers for slt
$query = "SELECT * FROM questionnaries,questionnaries_answers WHERE questionnaries.questionnarieid=questionnaries_answers.questionnarieid AND
questionnaries.type=10 AND questionnaries.createtime>'2015-02-19 12:30:07'";
$result = @mysql_query ($query);
$num_rows = mysql_num_rows($result);
$questionnaries_answers_tab='';
$questionnaries_answers1_tab='';
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
  
  $questionnaries_answers_tab[$row['questionid']]+=$row['answerid'];
  $questionnaries_answers1_tab[$row['questionid']]=$row['answers_groupid'];
}

//types settings, type , settingid 
$types_settings_tab[1][1]='1';
$types_settings_tab[1][2]='3';
$types_settings_tab[1][3]='5';

$questionnaries_answers_tab1='';
$questionnaries_answers_tab2_1='';
$questionnaries_answers_tab2_2='';
foreach ($questionnaries_answers_tab as $key => $value) {

  $questionnaries_answers_tab1[$key]=$questionnaries_answers_tab[$key]/$questionnaries_i;

  if ($questionnaries_answers1_tab[$key] == 1) {

    if ($questionnaries_answers_tab1[$key] < 3) {

      $proc1 = (($types_settings_tab[1][2]-$questionnaries_answers_tab1[$key])*50)/($types_settings_tab[1][2]-$types_settings_tab[1][1]);
      $questionnaries_answers_tab2_1[$key]=$proc1;
      $questionnaries_answers_tab2_2[$key]=$proc1*(-1);

    } else {

      $proc1 = (($types_settings_tab[1][3]-$questionnaries_answers_tab1[$key])*50)/($types_settings_tab[1][3]-$types_settings_tab[1][2]);
      $questionnaries_answers_tab2_1[$key]=$proc1;
      $questionnaries_answers_tab2_2[$key]=0;
    }
  } 
}
echo "questionnaries_answers_tab -- <pre>";
print_r($questionnaries_answers_tab);
echo "</pre>";

echo "questionnaries_answers1_tab -- <pre>";
print_r($questionnaries_answers1_tab);
echo "</pre>";

echo "questionnaries_answers_tab1 -- <pre>";
print_r($questionnaries_answers_tab1);
echo "</pre>";

echo "questionnaries_answers_tab2_1 -- <pre>";
print_r($questionnaries_answers_tab2_1);
echo "</pre>";

/*
echo "questionnaries_answers_tab -- <pre>";
print_r($questionnaries_answers_tab);
echo "</pre>";

echo "questionnaries_answers_tab1 -- <pre>";
print_r($questionnaries_answers_tab1);
echo "</pre>";
*/

?>

<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <link rel="icon" href="img/favicon.ico" type="image/x-icon">
  <title>Questionnaire Results</title>
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="css/results.css">
</head>
<body class="body-results">

  <header class="rs-head">
    <div class="rs-section-inner">
      <img class="rs-head-logo" src="img/tcp-logo-colour.svg" alt="logo">
    </div>
  </header>

  <? foreach ($questions_groups_tab as $key => $value) { ?>

    <!-- /.rs-head -->
    <header class="rs-section-head section-1">
      <div class="rs-section-inner">
        <div class="roundel">
          <img class="roundel-large" src="img/section-roundel-light.svg" alt="Section 1">
          <p class="roundel-text heading-1"><? echo $questions_groups_tab[$key]['i']; ?></p>
        </div>
        <h2 class="rs-section-head-title"><? echo $questions_groups_tab[$key]['name']; ?></h2>
      </div>
    </header>
    <!-- /.rs-section-head -->

    <section class="rs-section-container">
      <div class="rs-section-inner">
        <div class="rs-table">
          <div class="rs-table-row rs-table-head">
            <div class="rs-table-col rs-table-keys">
              <span class="rs-table-key prpl-key">Personal Ranking</span>
              <span class="rs-table-key blue-key">Top 100 Ranking</span>
              <span class="rs-table-key green-key">SLT Ranking</span>
            </div>
            <div class="rs-table-col rs-head-line-chart">
              <div class="rs-table-col-split">
                <span class="rs-table-col-cell">Strongly<br>disagree</span>
                <span class="rs-table-col-cell">Neutral</span>
                <span class="rs-table-col-cell">Strongly<br>agree</span>
              </div>
              <div class="rs-table-col-split hide-phone"></div>
            </div>
          </div>
          <? foreach ($questions_tab[$key] as $key1 => $value1) { ?>

            <? if ($questions_tab[$key][$key1]['answers_groupid'] == 1) { ?>

              <!-- /.rs-table-row -->
              <div class="rs-table-row">
                <div class="rs-table-col">
                  <span class="rs-question-num"><? echo $questions_tab[$key][$key1]['i']; ?></span>
                  <p class="rs-question"><? echo $questions_tab[$key][$key1]['name']; ?></p>
                </div>
                <div class="rs-table-col">
                  <div class="rs-table-col-split">
                    <div class="rs-line-chart">
                      <span class="rs-line-item rs-line-prpl negative" 
                      style="display:block;width: <? echo $questionnaries_answers_tab2_1[$key1]; ?>%;
                      margin-left: <? echo $questionnaries_answers_tab2_2[$key1]; ?>%;"></span>
                      <span class="rs-line-item rs-line-blue" style="width: 40%;"></span>
                    </div>
                  </div>
                  <div class="rs-table-col-split"></div>
                </div>
              </div>

            <? } elseif ($questions_tab[$key][$key1]['answers_groupid'] == 3) { ?>

              <!-- /.rs-table-row -->
              <div class="rs-table-row">
                <div class="rs-table-col rs-table-space">
                  <span class="rs-question-num"><? echo $questions_tab[$key][$key1]['i']; ?></span>
                  <p class="rs-question"><? echo $questions_tab[$key][$key1]['name']; ?></p>
                </div>
                <div class="rs-table-col">
                  <div class="rs-circle-chart-container">
                    <div class="rs-circle-chart-head">
                      <span class="rs-circle-chart-head-item">Least</span>
                      <span class="rs-circle-chart-head-item">Most</span>
                    </div>
                    <!-- /.rs-circle-chart-head -->
                    <div class="rs-circle-chart">
                      <div class="rs-circle-chart-item" style="width: 90%;">
                        <img src="img/person-img1.png" alt="" class="rs-circle-chart-avatar">
                        <div class="rs-circle-chart-text">
                          <p>Lorem ipsum dolor sit amet, et duo timeam voluptua appellantur. Congue noster, ad qui nemore quaeque.</p>
                          <p>Nibh nusquam suscipit per ex, etota soluta.</p>
                          <p>Comprehensam ne eam, nam diceret albucius. Congue noster, ad qui nemore quaeque.</p>
                        </div>
                      </div>
                      <div class="rs-circle-chart-item" style="width: 70%;">
                        <img src="img/person-img1.png" alt="" class="rs-circle-chart-avatar">
                        <div class="rs-circle-chart-text">
                          <p>Lorem ipsum dolor sit amet, et duo timeam voluptua appellantur. Congue noster, ad qui nemore quaeque.</p>
                          <p>Nibh nusquam suscipit per ex, etota soluta.</p>
                          <p>Comprehensam ne eam, nam diceret albucius. Congue noster, ad qui nemore quaeque.</p>
                        </div>
                      </div>
                      <div class="rs-circle-chart-item" style="width: 40%;">
                        <img src="img/person-img1.png" alt="" class="rs-circle-chart-avatar">
                        <div class="rs-circle-chart-text">
                          <p>Lorem ipsum dolor sit amet, et duo timeam voluptua appellantur. Congue noster, ad qui nemore quaeque.</p>
                          <p>Nibh nusquam suscipit per ex, etota soluta.</p>
                          <p>Comprehensam ne eam, nam diceret albucius. Congue noster, ad qui nemore quaeque.</p>
                        </div>
                      </div>
                      <div class="rs-circle-chart-item" style="width: 20%;">
                        <img src="img/person-img1.png" alt="" class="rs-circle-chart-avatar">
                        <div class="rs-circle-chart-text">
                          <p>Lorem ipsum dolor sit amet, et duo timeam voluptua appellantur. Congue noster, ad qui nemore quaeque.</p>
                          <p>Nibh nusquam suscipit per ex, etota soluta.</p>
                          <p>Comprehensam ne eam, nam diceret albucius. Congue noster, ad qui nemore quaeque.</p>
                        </div>
                      </div>
                    </div>
                    <!-- /.rs-circle-chart -->
                  </div>
                </div>
                <!-- /.rs-table-col -->
              </div>

            <? } elseif ($questions_tab[$key][$key1]['answers_groupid'] == 4) { ?>

              <!-- /.rs-table-row -->
              <div class="rs-table-row">
                <div class="rs-table-col rs-table-space">
                  <span class="rs-question-num"><? echo $questions_tab[$key][$key1]['i']; ?></span>
                  <p class="rs-question"><? echo $questions_tab[$key][$key1]['name']; ?></p>
                </div>
                <div class="rs-table-col">
                  <div class="rs-ball-chart">
                    <div class="rs-ball-chart-item" style="width: 150px; height: 150px"><span>Listen more</span></div>
                    <div class="rs-ball-chart-item" style="width: 120px; height: 120px"><span>Speak more</span></div>
                    <div class="rs-ball-chart-item" style="width: 100px; height: 100px"><span>More receptive to views</span></div>
                    <div class="rs-ball-chart-item" style="width: 50px; height: 50px"><span>More demanding</span></div>
                  </div>
                </div>

            <? } ?>
          <? } ?>

          </div>
          <!-- /.rs-table-row -->
        </div>
        <!-- /.rs-table -->
      </div>
    </section>
    <!-- /.rs-section-container -->
  <? } ?>


  <header class="rs-head">
    <div class="rs-section-inner">
      <img class="rs-head-logo" src="img/tcp-logo-colour.svg" alt="logo">
    </div>
  </header>
  <!-- /.rs-head -->

  <header class="rs-section-head section-1">
    <div class="rs-section-inner">
      <div class="roundel">
        <img class="roundel-large" src="img/section-roundel-light.svg" alt="Section 1">
        <p class="roundel-text heading-1">1</p>
      </div>
      <h2 class="rs-section-head-title">Reflecting on the 6 Attributes of High Performance Teams</h2>
    </div>
  </header>
  <!-- /.rs-section-head -->

  <section class="rs-section-container">
    <div class="rs-section-inner">
      <div class="rs-table">
        <div class="rs-table-row rs-table-head">
          <div class="rs-table-col rs-table-keys">
            <span class="rs-table-key prpl-key">Personal Ranking</span>
            <span class="rs-table-key blue-key">Top 100 Ranking</span>
            <span class="rs-table-key green-key">SLT Ranking</span>
          </div>
          <div class="rs-table-col rs-head-line-chart">
            <div class="rs-table-col-split">
              <span class="rs-table-col-cell">Strongly<br>disagree</span>
              <span class="rs-table-col-cell">Neutral</span>
              <span class="rs-table-col-cell">Strongly<br>agree</span>
            </div>
            <div class="rs-table-col-split hide-phone"></div>
          </div>
        </div>
        <!-- /.rs-table-row -->
        <div class="rs-table-row">
          <div class="rs-table-col">
            <span class="rs-question-num">1</span>
            <p class="rs-question">I believe my SLT colleagues have our team Purpose in mind every day</p>
          </div>
          <div class="rs-table-col">
            <div class="rs-table-col-split">
              <div class="rs-line-chart">
                <span class="rs-line-item rs-line-prpl negative" style="width: 20%;"></span>
                <span class="rs-line-item rs-line-blue" style="width: 40%;"></span>
              </div>
            </div>
            <div class="rs-table-col-split"></div>
          </div>
        </div>
        <!-- /.rs-table-row -->
        <div class="rs-table-row">
          <div class="rs-table-col">
            <span class="rs-question-num">2</span>
            <p class="rs-question">I am mindful of our team Purpose in my daily work</p>
          </div>
          <div class="rs-table-col">
            <div class="rs-table-col-split">
              <div class="rs-line-chart">
                <span class="rs-line-item rs-line-prpl" style="width: 20%;"></span>
                <span class="rs-line-item rs-line-blue" style="width: 10%;"></span>
              </div>
            </div>
            <div class="rs-table-col-split"></div>
          </div>
        </div>
        <!-- /.rs-table-row -->
        <div class="rs-table-row">
          <div class="rs-table-col">
            <span class="rs-question-num">3</span>
            <p class="rs-question">We check our business and functional responsibilities at the door</p>
          </div>
          <div class="rs-table-col">
            <div class="rs-table-col-split">
              <div class="rs-line-chart">
                <span class="rs-line-item rs-line-prpl negative" style="width: 20%;"></span>
                <span class="rs-line-item rs-line-blue negative" style="width: 30%;"></span>
              </div>
            </div>
            <div class="rs-table-col-split"></div>
          </div>
        </div>
        <!-- /.rs-table-row -->
        <div class="rs-table-row">
          <div class="rs-table-col">
            <span class="rs-question-num">4</span>
            <p class="rs-question">Who doesn't check their business and functional responsibilities at the door?</p>
          </div>
          <div class="rs-table-col">
            <div class="rs-table-col-split">
              <div class="rs-line-chart">
                <span class="rs-line-item rs-line-prpl" style="width: 50%;"></span>
                <span class="rs-line-item rs-line-blue" style="width: 10%;"></span>
              </div>
            </div>
            <div class="rs-table-col-split"></div>
          </div>
        </div>
        <!-- /.rs-table-row -->
        <div class="rs-table-row">
          <div class="rs-table-col">
            <span class="rs-question-num">5</span>
            <p class="rs-question">My excellent understanding of our people informs my conversations with them</p>
          </div>
          <div class="rs-table-col">
            <div class="rs-table-col-split">
              <div class="rs-line-chart">
                <span class="rs-line-item rs-line-prpl" style="width: 10%;"></span>
                <span class="rs-line-item rs-line-blue" style="width: 30%;"></span>
              </div>
            </div>
            <div class="rs-table-col-split"></div>
          </div>
        </div>
        <!-- /.rs-table-row -->
        <div class="rs-table-row">
          <div class="rs-table-col">
            <span class="rs-question-num">6</span>
            <p class="rs-question">I am responsive to the concerns of my people</p>
          </div>
          <div class="rs-table-col">
            <div class="rs-table-col-split">
              <div class="rs-line-chart">
                <span class="rs-line-item rs-line-prpl" style="width: 10%;"></span>
                <span class="rs-line-item rs-line-blue negative" style="width: 40%;"></span>
              </div>
            </div>
            <div class="rs-table-col-split"></div>
          </div>
        </div>
        <!-- /.rs-table-row -->
        <div class="rs-table-row">
          <div class="rs-table-col">
            <span class="rs-question-num">7</span>
            <p class="rs-question">I inspire people by using stories to communicate key messages</p>
          </div>
          <div class="rs-table-col">
            <div class="rs-table-col-split">
              <div class="rs-line-chart">
                <span class="rs-line-item rs-line-prpl" style="width: 30%;"></span>
                <span class="rs-line-item rs-line-blue" style="width: 10%;"></span>
              </div>
            </div>
            <div class="rs-table-col-split"></div>
          </div>
        </div>
        <!-- /.rs-table-row -->
        <div class="rs-table-row">
          <div class="rs-table-col">
            <span class="rs-question-num">8</span>
            <p class="rs-question">Communication is my leadership priority</p>
          </div>
          <div class="rs-table-col">
            <div class="rs-table-col-split">
              <div class="rs-line-chart">
                <span class="rs-line-item rs-line-prpl" style="width: 50%;"></span>
                <span class="rs-line-item rs-line-blue" style="width: 40%;"></span>
              </div>
            </div>
            <div class="rs-table-col-split"></div>
          </div>
        </div>
        <!-- /.rs-table-row -->
        <div class="rs-table-row">
          <div class="rs-table-col">
            <span class="rs-question-num">9</span>
            <p class="rs-question">I understand my role as part of the team (as different from my business or functional role)</p>
          </div>
          <div class="rs-table-col">
            <div class="rs-table-col-split">
              <div class="rs-line-chart">
                <span class="rs-line-item rs-line-prpl" style="width: 0%;"></span>
                <span class="rs-line-item rs-line-blue negative" style="width: 30%;"></span>
              </div>
            </div>
            <div class="rs-table-col-split"></div>
          </div>
        </div>
        <!-- /.rs-table-row -->
        <div class="rs-table-row">
          <div class="rs-table-col">
            <span class="rs-question-num">10</span>
            <p class="rs-question">How do you now describe your role within the SLT?</p>
          </div>
          <div class="rs-table-col">
            <div class="rs-table-col-split">
              <div class="rs-line-chart">
                <span class="rs-line-item rs-line-prpl" style="width: 40%;"></span>
                <span class="rs-line-item rs-line-blue" style="width: 0%;"></span>
              </div>
            </div>
            <div class="rs-table-col-split"></div>
          </div>
        </div>
        <!-- /.rs-table-row -->
        <div class="rs-table-row">
          <div class="rs-table-col">
            <span class="rs-question-num">11</span>
            <p class="rs-question">What would you like more from your colleagues?</p>
          </div>
          <div class="rs-table-col">
            <div class="rs-table-col-split">
              <div class="rs-line-chart">
                <span class="rs-line-item rs-line-prpl" style="width: 20%;"></span>
                <span class="rs-line-item rs-line-blue negative" style="width: 10%;"></span>
              </div>
            </div>
            <div class="rs-table-col-split"></div>
          </div>
        </div>
        <!-- /.rs-table-row -->
        <div class="rs-table-row">
          <div class="rs-table-col">
            <span class="rs-question-num">12</span>
            <p class="rs-question">Do the SLT act as a cohesive unit?</p>
          </div>
          <div class="rs-table-col">
            <div class="rs-table-col-split">
              <div class="rs-line-chart">
                <span class="rs-line-item rs-line-prpl" style="width: 0%;"></span>
                <span class="rs-line-item rs-line-blue" style="width: 40%;"></span>
              </div>
            </div>
            <div class="rs-table-col-split"></div>
          </div>
        </div>
        <!-- /.rs-table-row -->
        <div class="rs-table-row">
          <div class="rs-table-col rs-table-space">
            <span class="rs-question-num">13</span>
            <p class="rs-question">Who do you believe thinks they should be served by our people? And why?</p>
          </div>
          <div class="rs-table-col">
            <div class="rs-circle-chart-container">
              <div class="rs-circle-chart-head">
                <span class="rs-circle-chart-head-item">Least</span>
                <span class="rs-circle-chart-head-item">Most</span>
              </div>
              <!-- /.rs-circle-chart-head -->
              <div class="rs-circle-chart">
                <div class="rs-circle-chart-item" style="width: 90%;">
                  <img src="img/person-img1.png" alt="" class="rs-circle-chart-avatar">
                  <div class="rs-circle-chart-text">
                    <p>Lorem ipsum dolor sit amet, et duo timeam voluptua appellantur. Congue noster, ad qui nemore quaeque.</p>
                    <p>Nibh nusquam suscipit per ex, etota soluta.</p>
                    <p>Comprehensam ne eam, nam diceret albucius. Congue noster, ad qui nemore quaeque.</p>
                  </div>
                </div>
                <div class="rs-circle-chart-item" style="width: 70%;">
                  <img src="img/person-img1.png" alt="" class="rs-circle-chart-avatar">
                  <div class="rs-circle-chart-text">
                    <p>Lorem ipsum dolor sit amet, et duo timeam voluptua appellantur. Congue noster, ad qui nemore quaeque.</p>
                    <p>Nibh nusquam suscipit per ex, etota soluta.</p>
                    <p>Comprehensam ne eam, nam diceret albucius. Congue noster, ad qui nemore quaeque.</p>
                  </div>
                </div>
                <div class="rs-circle-chart-item" style="width: 40%;">
                  <img src="img/person-img1.png" alt="" class="rs-circle-chart-avatar">
                  <div class="rs-circle-chart-text">
                    <p>Lorem ipsum dolor sit amet, et duo timeam voluptua appellantur. Congue noster, ad qui nemore quaeque.</p>
                    <p>Nibh nusquam suscipit per ex, etota soluta.</p>
                    <p>Comprehensam ne eam, nam diceret albucius. Congue noster, ad qui nemore quaeque.</p>
                  </div>
                </div>
                <div class="rs-circle-chart-item" style="width: 20%;">
                  <img src="img/person-img1.png" alt="" class="rs-circle-chart-avatar">
                  <div class="rs-circle-chart-text">
                    <p>Lorem ipsum dolor sit amet, et duo timeam voluptua appellantur. Congue noster, ad qui nemore quaeque.</p>
                    <p>Nibh nusquam suscipit per ex, etota soluta.</p>
                    <p>Comprehensam ne eam, nam diceret albucius. Congue noster, ad qui nemore quaeque.</p>
                  </div>
                </div>
              </div>
              <!-- /.rs-circle-chart -->
            </div>
          </div>
          <!-- /.rs-table-col -->
        </div>
        <!-- /.rs-table-row -->
        <div class="rs-table-row">
          <div class="rs-table-col rs-table-space">
            <span class="rs-question-num">14</span>
            <p class="rs-question">What would you like more from your colleagues?</p>
          </div>
          <div class="rs-table-col">
            <div class="rs-ball-chart">
              <div class="rs-ball-chart-item" style="width: 150px; height: 150px"><span>Listen more</span></div>
              <div class="rs-ball-chart-item" style="width: 120px; height: 120px"><span>Speak more</span></div>
              <div class="rs-ball-chart-item" style="width: 100px; height: 100px"><span>More receptive to views</span></div>
              <div class="rs-ball-chart-item" style="width: 50px; height: 50px"><span>More demanding</span></div>
            </div>
          </div>
        </div>
        <!-- /.rs-table-row -->
      </div>
      <!-- /.rs-table -->
    </div>
  </section>
  <!-- /.rs-section-container -->

  <header class="rs-section-head section-2">
    <div class="rs-section-inner">
      <div class="roundel">
        <img class="roundel-large" src="img/section-roundel-light.svg" alt="Section 2">
        <p class="roundel-text heading-2">2</p>
      </div>
      <h2 class="rs-section-head-title">Our Charter</h2>
      <h3 class="rs-section-subhead-title">To what extent do you believe that the SLT is recognised for:</h3>
    </div>
  </header>
  <!-- /.rs-section-head -->

  <section class="rs-section-container">
    <div class="rs-section-inner">
      <div class="rs-table rs-table-third">
        <div class="rs-table-row rs-table-head">
          <div class="rs-table-col rs-table-keys">
            <span class="rs-table-key prpl-key">Personal Ranking</span>
            <span class="rs-table-key blue-key">Top 100 Ranking</span>
            <span class="rs-table-key green-key">SLT Ranking</span>
          </div>
          <div class="rs-table-col rs-head-line-chart">
            <div class="rs-table-col-split">
              <span class="rs-table-col-cell">Strongly<br>disagree</span>
              <span class="rs-table-col-cell">Neutral</span>
              <span class="rs-table-col-cell">Strongly<br>agree</span>
            </div>
            <div class="rs-table-col-split hide-phone">
              <span class="rs-table-col-cell">Strongly<br>disagree</span>
              <span class="rs-table-col-cell">Neutral</span>
              <span class="rs-table-col-cell">Strongly<br>agree</span>
            </div>
          </div>
        </div>
        <!-- /.rs-table-row -->
        <div class="rs-table-row">
          <div class="rs-table-col">
            <span class="rs-question-num">15</span>
            <p class="rs-question">Putting customers at the centre</p>
          </div>
          <div class="rs-table-col">
            <div class="rs-table-col-split">
              <div class="rs-line-chart">
                <span class="rs-line-item rs-line-prpl" style="width: 0%;"></span>
                <span class="rs-line-item rs-line-blue" style="width: 40%;"></span>
              </div>
            </div>
            <div class="rs-table-col-split">
              <div class="rs-line-chart">
                <span class="rs-line-item rs-line-prpl negative" style="width: 30%;"></span>
                <span class="rs-line-item rs-line-green negative" style="width: 40%;"></span>
              </div>
            </div>
          </div>
        </div>
        <!-- /.rs-table-row -->
        <div class="rs-table-row">
          <div class="rs-table-col">
            <span class="rs-question-num">16</span>
            <p class="rs-question">Developing our staff</p>
          </div>
          <div class="rs-table-col">
            <div class="rs-table-col-split">
              <div class="rs-line-chart">
                <span class="rs-line-item rs-line-prpl" style="width: 10%;"></span>
                <span class="rs-line-item rs-line-blue" style="width: 20%;"></span>
              </div>
            </div>
            <div class="rs-table-col-split">
              <div class="rs-line-chart">
                <span class="rs-line-item rs-line-prpl negative" style="width: 20%;"></span>
                <span class="rs-line-item rs-line-green" style="width: 30%;"></span>
              </div>
            </div>
          </div>
        </div>
        <!-- /.rs-table-row -->
        <div class="rs-table-row">
          <div class="rs-table-col">
            <span class="rs-question-num">17</span>
            <p class="rs-question">Being visible to our team</p>
          </div>
          <div class="rs-table-col">
            <div class="rs-table-col-split">
              <div class="rs-line-chart">
                <span class="rs-line-item rs-line-prpl" style="width: 40%;"></span>
                <span class="rs-line-item rs-line-blue" style="width: 0%;"></span>
              </div>
            </div>
            <div class="rs-table-col-split">
              <div class="rs-line-chart">
                <span class="rs-line-item rs-line-prpl negative" style="width: 10%;"></span>
                <span class="rs-line-item rs-line-green negative" style="width: 30%;"></span>
              </div>
            </div>
          </div>
        </div>
        <!-- /.rs-table-row -->
        <div class="rs-table-row">
          <div class="rs-table-col">
            <span class="rs-question-num">18</span>
            <p class="rs-question">Being decisive</p>
          </div>
          <div class="rs-table-col">
            <div class="rs-table-col-split">
              <div class="rs-line-chart">
                <span class="rs-line-item rs-line-prpl" style="width: 10%;"></span>
                <span class="rs-line-item rs-line-blue" style="width: 40%;"></span>
              </div>
            </div>
            <div class="rs-table-col-split">
              <div class="rs-line-chart">
                <span class="rs-line-item rs-line-prpl" style="width: 20%;"></span>
                <span class="rs-line-item rs-line-green" style="width: 40%;"></span>
              </div>
            </div>
          </div>
        </div>
        <!-- /.rs-table-row -->
        <div class="rs-table-row">
          <div class="rs-table-col">
            <span class="rs-question-num">19</span>
            <p class="rs-question">Focusing on execution</p>
          </div>
          <div class="rs-table-col">
            <div class="rs-table-col-split">
              <div class="rs-line-chart">
                <span class="rs-line-item rs-line-prpl negative" style="width: 40%;"></span>
                <span class="rs-line-item rs-line-blue" style="width: 20%;"></span>
              </div>
            </div>
            <div class="rs-table-col-split">
              <div class="rs-line-chart">
                <span class="rs-line-item rs-line-prpl negative" style="width: 10%;"></span>
                <span class="rs-line-item rs-line-green negative" style="width: 20%;"></span>
              </div>
            </div>
          </div>
        </div>
        <!-- /.rs-table-row -->
        <div class="rs-table-row">
          <div class="rs-table-col">
            <span class="rs-question-num">20</span>
            <p class="rs-question">Always having a plan B</p>
          </div>
          <div class="rs-table-col">
            <div class="rs-table-col-split">
              <div class="rs-line-chart">
                <span class="rs-line-item rs-line-prpl" style="width: 40%;"></span>
                <span class="rs-line-item rs-line-blue negative" style="width: 10%;"></span>
              </div>
            </div>
            <div class="rs-table-col-split">
              <div class="rs-line-chart">
                <span class="rs-line-item rs-line-prpl" style="width: 10%;"></span>
                <span class="rs-line-item rs-line-green" style="width: 40%;"></span>
              </div>
            </div>
          </div>
        </div>
        <!-- /.rs-table-row -->
        <div class="rs-table-row">
          <div class="rs-table-col">
            <span class="rs-question-num">21</span>
            <p class="rs-question">Hitting dates we commit to</p>
          </div>
          <div class="rs-table-col">
            <div class="rs-table-col-split">
              <div class="rs-line-chart">
                <span class="rs-line-item rs-line-prpl" style="width: 10%;"></span>
                <span class="rs-line-item rs-line-blue" style="width: 20%;"></span>
              </div>
            </div>
            <div class="rs-table-col-split">
              <div class="rs-line-chart">
                <span class="rs-line-item rs-line-prpl" style="width: 0%;"></span>
                <span class="rs-line-item rs-line-green negative" style="width: 40%;"></span>
              </div>
            </div>
          </div>
        </div>
        <!-- /.rs-table-row -->
        <div class="rs-table-row">
          <div class="rs-table-col">
            <span class="rs-question-num">22</span>
            <p class="rs-question">Being passionate about our business</p>
          </div>
          <div class="rs-table-col">
            <div class="rs-table-col-split">
              <div class="rs-line-chart">
                <span class="rs-line-item rs-line-prpl" style="width: 10%;"></span>
                <span class="rs-line-item rs-line-blue negative" style="width: 30%;"></span>
              </div>
            </div>
            <div class="rs-table-col-split">
              <div class="rs-line-chart">
                <span class="rs-line-item rs-line-prpl negative" style="width: 30%;"></span>
                <span class="rs-line-item rs-line-green negative" style="width: 40%;"></span>
              </div>
            </div>
          </div>
        </div>
        <!-- /.rs-table-row -->
        <div class="rs-table-row">
          <div class="rs-table-col">
            <span class="rs-question-num">23</span>
            <p class="rs-question">Communicating, communicating, communicating</p>
          </div>
          <div class="rs-table-col">
            <div class="rs-table-col-split">
              <div class="rs-line-chart">
                  <span class="rs-line-item rs-line-prpl negative" style="width: 10%;"></span>
                <span class="rs-line-item rs-line-blue negative" style="width: 30%;"></span>
              </div>
            </div>
            <div class="rs-table-col-split">
              <div class="rs-line-chart">
                  <span class="rs-line-item rs-line-prpl" style="width: 10%;"></span>
                <span class="rs-line-item rs-line-green" style="width: 30%;"></span>
              </div>
            </div>
          </div>
        </div>
        <!-- /.rs-table-row -->
        <div class="rs-table-row">
          <div class="rs-table-col">
            <span class="rs-question-num">24</span>
            <p class="rs-question">Role-modeling, leadership and team behaviours</p>
          </div>
          <div class="rs-table-col">
            <div class="rs-table-col-split">
              <div class="rs-line-chart">
                <span class="rs-line-item rs-line-prpl negative" style="width: 40%;"></span>
                <span class="rs-line-item rs-line-blue negative" style="width: 30%;"></span>
              </div>
            </div>
            <div class="rs-table-col-split">
              <div class="rs-line-chart">
                <span class="rs-line-item rs-line-prpl" style="width: 30%;"></span>
                <span class="rs-line-item rs-line-green" style="width: 0;"></span>
              </div>
            </div>
          </div>
        </div>
        <!-- /.rs-table-row -->
        <div class="rs-table-row">
          <div class="rs-table-col">
            <span class="rs-question-num">25</span>
            <p class="rs-question">Giving and receiving feedback readily</p>
          </div>
          <div class="rs-table-col">
            <div class="rs-table-col-split">
              <div class="rs-line-chart">
                <span class="rs-line-item rs-line-prpl" style="width: 40%;"></span>
                <span class="rs-line-item rs-line-blue negative" style="width: 30%;"></span>
              </div>
            </div>
            <div class="rs-table-col-split">
              <div class="rs-line-chart">
                <span class="rs-line-item rs-line-prpl negative" style="width: 10%;"></span>
                <span class="rs-line-item rs-line-green" style="width: 30%;"></span>
              </div>
            </div>
          </div>
        </div>
        <!-- /.rs-table-row -->
        <div class="rs-table-row">
          <div class="rs-table-col">
            <span class="rs-question-num">26</span>
            <p class="rs-question">Having face-to-face interactions wherever possible</p>
          </div>
          <div class="rs-table-col">
            <div class="rs-table-col-split">
              <div class="rs-line-chart">
                <span class="rs-line-item rs-line-prpl" style="width: 0%;"></span>
                <span class="rs-line-item rs-line-blue" style="width: 10%;"></span>
              </div>
            </div>
            <div class="rs-table-col-split">
              <div class="rs-line-chart">
                <span class="rs-line-item rs-line-prpl" style="width: 30%;"></span>
                <span class="rs-line-item rs-line-green" style="width: 50%;"></span>
              </div>
            </div>
          </div>
        </div>
        <!-- /.rs-table-row -->
        <div class="rs-table-row">
          <div class="rs-table-col">
            <span class="rs-question-num">27</span>
            <p class="rs-question">Effective prioritization</p>
          </div>
          <div class="rs-table-col">
            <div class="rs-table-col-split">
              <div class="rs-line-chart">
                <span class="rs-line-item rs-line-prpl negative" style="width: 30%;"></span>
                <span class="rs-line-item rs-line-blue negative" style="width: 40%;"></span>
              </div>
            </div>
            <div class="rs-table-col-split">
              <div class="rs-line-chart">
                <span class="rs-line-item rs-line-prpl negative" style="width: 10%;"></span>
                <span class="rs-line-item rs-line-green negative" style="width: 30%;"></span>
              </div>
            </div>
          </div>
        </div>
        <!-- /.rs-table-row -->
        <div class="rs-table-row">
          <div class="rs-table-col">
            <span class="rs-question-num">28</span>
            <p class="rs-question">Effective decision-making</p>
          </div>
          <div class="rs-table-col">
            <div class="rs-table-col-split">
              <div class="rs-line-chart">
                <span class="rs-line-item rs-line-prpl" style="width: 40%;"></span>
                <span class="rs-line-item rs-line-blue" style="width: 30%;"></span>
              </div>
            </div>
            <div class="rs-table-col-split">
              <div class="rs-line-chart">
                <span class="rs-line-item rs-line-prpl" style="width: 30%;"></span>
                <span class="rs-line-item rs-line-green" style="width: 40%;"></span>
              </div>
            </div>
          </div>
        </div>
        <!-- /.rs-table-row -->
        <div class="rs-table-row">
          <div class="rs-table-col">
            <span class="rs-question-num">29</span>
            <p class="rs-question">Role-modeling punctuality</p>
          </div>
          <div class="rs-table-col">
            <div class="rs-table-col-split">
              <div class="rs-line-chart">
                <span class="rs-line-item rs-line-prpl negative" style="width: 30%;"></span>
                <span class="rs-line-item rs-line-blue negative" style="width: 40%;"></span>
              </div>
            </div>
            <div class="rs-table-col-split">
              <div class="rs-line-chart">
                <span class="rs-line-item rs-line-prpl negative" style="width: 10%;"></span>
                <span class="rs-line-item rs-line-green negative" style="width: 50%;"></span>
              </div>
            </div>
          </div>
        </div>
        <!-- /.rs-table-row -->
        <div class="rs-table-row">
          <div class="rs-table-col">
            <span class="rs-question-num">30</span>
            <p class="rs-question">We have effective meetings</p>
          </div>
          <div class="rs-table-col">
            <div class="rs-table-col-split">
              <div class="rs-line-chart">
                <span class="rs-line-item rs-line-prpl" style="width: 20%;"></span>
                <span class="rs-line-item rs-line-blue" style="width: 40%;"></span>
              </div>
            </div>
            <div class="rs-table-col-split">
              <div class="rs-line-chart">
                <span class="rs-line-item rs-line-prpl" style="width: 10%;"></span>
                <span class="rs-line-item rs-line-green" style="width: 50%;"></span>
              </div>
            </div>
          </div>
        </div>
        <!-- /.rs-table-row -->
        <div class="rs-table-row">
          <div class="rs-table-col">
            <span class="rs-question-num">31</span>
            <p class="rs-question">Leveraging diversity</p>
          </div>
          <div class="rs-table-col">
            <div class="rs-table-col-split">
              <div class="rs-line-chart">
                <span class="rs-line-item rs-line-prpl" style="width: 20%;"></span>
                <span class="rs-line-item rs-line-blue" style="width: 10%;"></span>
              </div>
            </div>
            <div class="rs-table-col-split">
              <div class="rs-line-chart">
                <span class="rs-line-item rs-line-prpl" style="width: 40%;"></span>
                <span class="rs-line-item rs-line-green" style="width: 10%;"></span>
              </div>
            </div>
          </div>
        </div>
        <!-- /.rs-table-row -->
      </div>
      <!-- /.rs-table -->
    </div>
    <!-- /.rs-section-inner -->
  </section>
  <!-- /.rs-section-container -->

  <header class="rs-section-head section-1">
    <div class="rs-section-inner">
      <div class="roundel">
        <img class="roundel-large" src="img/section-roundel-light.svg" alt="Section 3">
        <p class="roundel-text heading-1">3</p>
      </div>
      <h1 class="rs-section-head-title">Reflecting on our Emotional Capital</h1>
    </div>
  </header>
  <!-- /.rs-section-head -->

  <section class="rs-section-container">
    <div class="rs-section-inner">
      <div class="rs-table rs-table-third">
        <div class="rs-table-row rs-table-head">
          <div class="rs-table-col rs-table-keys">
            <span class="rs-table-key prpl-key">Personal Ranking</span>
            <span class="rs-table-key blue-key">Top 100 Ranking</span>
            <span class="rs-table-key green-key">SLT Ranking</span>
          </div>
          <div class="rs-table-col rs-head-line-chart">
            <div class="rs-table-col-split">
              <span class="rs-table-col-cell">Strongly<br>disagree</span>
              <span class="rs-table-col-cell">Neutral</span>
              <span class="rs-table-col-cell">Strongly<br>agree</span>
            </div>
            <div class="rs-table-col-split hide-phone">
              <span class="rs-table-col-cell">Strongly<br>disagree</span>
              <span class="rs-table-col-cell">Neutral</span>
              <span class="rs-table-col-cell">Strongly<br>agree</span>
            </div>
          </div>
        </div>
        <!-- /.rs-table-row -->
        <div class="rs-table-row">
          <div class="rs-table-col">
            <span class="rs-question-num">32</span>
            <p class="rs-question">I understand how my behavior affects others</p>
          </div>
          <div class="rs-table-col">
            <div class="rs-table-col-split">
              <div class="rs-line-chart">
                <span class="rs-line-item rs-line-prpl negative" style="width: 40%;"></span>
                <span class="rs-line-item rs-line-blue negative" style="width: 30%;"></span>
              </div>
            </div>
            <div class="rs-table-col-split">
              <div class="rs-line-chart">
                <span class="rs-line-item rs-line-prpl" style="width: 40%;"></span>
                <span class="rs-line-item rs-line-green" style="width: 10%;"></span>
              </div>
            </div>
          </div>
        </div>
        <!-- /.rs-table-row -->
        <div class="rs-table-row">
          <div class="rs-table-col">
            <span class="rs-question-num">33</span>
            <p class="rs-question">I have solid self-belief</p>
          </div>
          <div class="rs-table-col">
            <div class="rs-table-col-split">
              <div class="rs-line-chart">
                <span class="rs-line-item rs-line-prpl" style="width: 40%;"></span>
                <span class="rs-line-item rs-line-blue" style="width: 10%;"></span>
              </div>
            </div>
            <div class="rs-table-col-split">
              <div class="rs-line-chart">
                <span class="rs-line-item rs-line-prpl" style="width: 0%;"></span>
                <span class="rs-line-item rs-line-green" style="width: 40%;"></span>
              </div>
            </div>
          </div>
        </div>
        <!-- /.rs-table-row -->
        <div class="rs-table-row">
          <div class="rs-table-col">
            <span class="rs-question-num">34</span>
            <p class="rs-question">I can take control of a situation and direct others when they need it</p>
          </div>
          <div class="rs-table-col">
            <div class="rs-table-col-split">
              <div class="rs-line-chart">
                <span class="rs-line-item rs-line-prpl negative" style="width: 0%;"></span>
                <span class="rs-line-item rs-line-blue negative" style="width: 40%;"></span>
              </div>
            </div>
            <div class="rs-table-col-split">
              <div class="rs-line-chart">
                <span class="rs-line-item rs-line-prpl negative" style="width: 10%;"></span>
                <span class="rs-line-item rs-line-green negative" style="width: 50%;"></span>
              </div>
            </div>
          </div>
        </div>
        <!-- /.rs-table-row -->
        <div class="rs-table-row">
          <div class="rs-table-col">
            <span class="rs-question-num">35</span>
            <p class="rs-question">I am strongly motivated to achieve goals</p>
          </div>
          <div class="rs-table-col">
            <div class="rs-table-col-split">
              <div class="rs-line-chart">
                <span class="rs-line-item rs-line-prpl" style="width: 40%;"></span>
                <span class="rs-line-item rs-line-blue" style="width: 50%;"></span>
              </div>
            </div>
            <div class="rs-table-col-split">
              <div class="rs-line-chart">
                <span class="rs-line-item rs-line-prpl" style="width: 20%;"></span>
                <span class="rs-line-item rs-line-green" style="width: 30%;"></span>
              </div>
            </div>
          </div>
        </div>
        <!-- /.rs-table-row -->
        <div class="rs-table-row">
          <div class="rs-table-col">
            <span class="rs-question-num">36</span>
            <p class="rs-question">I find it easy to tell people what I think</p>
          </div>
          <div class="rs-table-col">
            <div class="rs-table-col-split">
              <div class="rs-line-chart">
                <span class="rs-line-item rs-line-prpl" style="width: 40%;"></span>
                <span class="rs-line-item rs-line-blue" style="width: 10%;"></span>
              </div>
            </div>
            <div class="rs-table-col-split">
              <div class="rs-line-chart">
                <span class="rs-line-item rs-line-prpl" style="width: 20%;"></span>
                <span class="rs-line-item rs-line-green" style="width: 0%;"></span>
              </div>
            </div>
          </div>
        </div>
        <!-- /.rs-table-row -->
        <div class="rs-table-row">
          <div class="rs-table-col">
            <span class="rs-question-num">37</span>
            <p class="rs-question">I like helping people achieve their goals</p>
          </div>
          <div class="rs-table-col">
            <div class="rs-table-col-split">
              <div class="rs-line-chart">
                <span class="rs-line-item rs-line-prpl negative" style="width: 10%;"></span>
                <span class="rs-line-item rs-line-blue negative" style="width: 30%;"></span>
              </div>
            </div>
            <div class="rs-table-col-split">
              <div class="rs-line-chart">
                <span class="rs-line-item rs-line-prpl negative" style="width: 20%;"></span>
                <span class="rs-line-item rs-line-green negative" style="width: 30%;"></span>
              </div>
            </div>
          </div>
        </div>
        <!-- /.rs-table-row -->
        <div class="rs-table-row">
          <div class="rs-table-col">
            <span class="rs-question-num">38</span>
            <p class="rs-question">I am curious, listen well and can ‘get where another person is coming from'</p>
          </div>
          <div class="rs-table-col">
            <div class="rs-table-col-split">
              <div class="rs-line-chart">
                <span class="rs-line-item rs-line-prpl" style="width: 40%;"></span>
                <span class="rs-line-item rs-line-blue" style="width: 10%;"></span>
              </div>
            </div>
            <div class="rs-table-col-split">
              <div class="rs-line-chart">
                <span class="rs-line-item rs-line-prpl" style="width: 20%;"></span>
                <span class="rs-line-item rs-line-green" style="width: 40%;"></span>
              </div>
            </div>
          </div>
        </div>
        <!-- /.rs-table-row -->
        <div class="rs-table-row">
          <div class="rs-table-col">
            <span class="rs-question-num">39</span>
            <p class="rs-question">I remain calm under pressure</p>
          </div>
          <div class="rs-table-col">
            <div class="rs-table-col-split">
              <div class="rs-line-chart">
                <span class="rs-line-item rs-line-prpl" style="width: 30%;"></span>
                <span class="rs-line-item rs-line-blue" style="width: 40%;"></span>
              </div>
            </div>
            <div class="rs-table-col-split">
              <div class="rs-line-chart">
                <span class="rs-line-item rs-line-prpl" style="width: 20%;"></span>
                <span class="rs-line-item rs-line-green" style="width: 30%;"></span>
              </div>
            </div>
          </div>
        </div>
        <!-- /.rs-table-row -->
        <div class="rs-table-row">
          <div class="rs-table-col">
            <span class="rs-question-num">40</span>
            <p class="rs-question">I find it hard to change my opinion</p>
          </div>
          <div class="rs-table-col">
            <div class="rs-table-col-split">
              <div class="rs-line-chart">
                <span class="rs-line-item rs-line-prpl" style="width: 0%;"></span>
                <span class="rs-line-item rs-line-blue" style="width: 10%;"></span>
              </div>
            </div>
            <div class="rs-table-col-split">
              <div class="rs-line-chart">
                <span class="rs-line-item rs-line-prpl" style="width: 10%;"></span>
                <span class="rs-line-item rs-line-green" style="width: 0%;"></span>
              </div>
            </div>
          </div>
        </div>
        <!-- /.rs-table-row -->
        <div class="rs-table-row">
          <div class="rs-table-col">
            <span class="rs-question-num">41</span>
            <p class="rs-question">I see the possibilities of what can be achieved despite the difficulties</p>
          </div>
          <div class="rs-table-col">
            <div class="rs-table-col-split">
              <div class="rs-line-chart">
                <span class="rs-line-item rs-line-prpl negative" style="width: 10%;"></span>
                <span class="rs-line-item rs-line-green negative" style="width: 30%;"></span>
              </div>
            </div>
            <div class="rs-table-col-split">
              <div class="rs-line-chart">
                <span class="rs-line-item rs-line-prpl negative" style="width: 20%;"></span>
                <span class="rs-line-item rs-line-green negative" style="width: 0;"></span>
              </div>
            </div>
          </div>
        </div>
        <!-- /.rs-table-row -->
      </div>
    </div>
  </section>
  <!-- /.rs-section-container -->

  <script>
    var chartItems = document.querySelectorAll('.rs-circle-chart-item');
    var chartItemArray = Array.prototype.slice.call(chartItems);
    chartItemArray.forEach(function (item, idx) {
      item.addEventListener('click', function (evt) {
        if (!item.classList.contains('hidden')) {
          item.classList.add('hidden');
        }
      });
    });
  </script>
</body>
</html>