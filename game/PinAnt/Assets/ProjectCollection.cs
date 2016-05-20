using UnityEngine;
using System.Collections;
using System;
using LitJson;

 public class parseJSON
 {
     public string title;
     public string id;
     public ArrayList but_title;
     public ArrayList but_image;
 }

 public class ProjectCollection : MonoBehaviour
 {
   private string jsonString;
   private JsonData itemData;

   IEnumerator Start()
   {
     string url = "http://bananas.multimediatechnology.be/api/projects";

     WWW www = new WWW(url);
     yield return www;
     Debug.Log(www);
     if (www.error == null)
     {
       //Processjson(www.text);
       itemData = JsonMapper.ToObject(www.text);
       Debug.Log(itemData.Count);
       Debug.Log(itemData[0][0]["titel"]);
     }
     else
     {
       Debug.Log("ERROR: " + www.error);
     }
     //itemData = JsonMapper.ToObject(jsonString);
   }
   private void Processjson(string jsonString)
   {
     JsonData jsonvale = JsonMapper.ToObject(jsonString);
     parseJSON parsejson;
     parsejson = new parseJSON();
     parsejson.title = jsonvale["title"].ToString();
     parsejson.id = jsonvale["ID"].ToString();

     parsejson.but_title = new ArrayList();
     parsejson.but_image = new ArrayList();

     for (int i = 0; i < jsonvale["buttons"].Count; i++)
     {
       parsejson.but_title.Add(jsonvale["buttons"][i]["title"].ToString());
       parsejson.but_image.Add(jsonvale["buttons"][i]["image"].ToString());
     }
   }
 }