using UnityEngine;
using System.Collections;
using System;
using LitJson;

public class ParseJSON
{
  public string id;
  public string titel;
  public string uitleg;
  public string fotonaam;
  public string einddatum;
  public int kostprijs;
  public int fase;
  public int likes;
  public int aantal_bekeken;
  public int created_at;
  public int updated_at;
}

public class ProjectCollection : MonoBehaviour
{

  void Start()
  {
    /*string url = "http://bananas.multimediatechnology.be/api/api";

    WWW www = new WWW(url);
    Debug.Log(url);*/
    /*if (www.error == null)
    {*/
      //Processjson(www.data);
    /*}
    else
    {
      Debug.Log("ERROR: " + www.error);
    }*/
    //itemData = JsonMapper.ToObject(jsonString);
  }
  private void Processjson(string jsonString)
  {
    /*
    JsonData jsonvale = JsonMapper.ToObject(jsonString);
    ParseJSON parsejson;
    parsejson = new ParseJSON();
    parsejson.titel = jsonvale["titel"].ToString();
    parsejson.id = jsonvale["id"].ToString();*/
  }
}