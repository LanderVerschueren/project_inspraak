using UnityEngine;
using System.Collections;
using System.IO;
using LitJson;
using System.Collections.Generic;
using System.ComponentModel;

public class ProjectSettings : MonoBehaviour {
  public static int totalProjects;
  public static int currentprojectNr;

  private string jsonString;
  private JsonData itemData;
  public static List<Project> projectList;
  //public string[] projectIds;
  //public string[] projectTitles;
  

	// Use this for initialization
	void Start () {
    jsonString = File.ReadAllText(Application.dataPath + "/Resources/bananas.json");
    itemData = JsonMapper.ToObject(jsonString);

    totalProjects = itemData[0].Count; //tel totaal aantal projecten

    projectList = new List<Project>();

    //projectIds = new string[totalProjects];
    //projectTitles = new string[totalProjects];

    LoadJsonData(currentprojectNr);

    //Debug.Log(projectList[0].projectID);

    /*Debug.Log(jsonString);
    Debug.Log(itemData[0][0]["titel"]);
    Debug.Log("total projects =" + itemData[0].Count);*/
	}
	
	// Update is called once per frame
	void Update () {
	
	}

  void PrintAllProjectInfo(Project projectToPrint)
  {
    foreach (PropertyDescriptor descriptor in TypeDescriptor.GetProperties(projectToPrint))
    {
      string name = descriptor.Name;
      object value = descriptor.GetValue(projectToPrint);
      Debug.Log(name + " = " + value);
    }
  }

  void LoadJsonData (int projectnr) //alles inladen voor 1 project
  {
    Project project = new Project();

    project.id = itemData[0][projectnr]["id"].ToString();
    project.title = itemData[0][projectnr]["titel"].ToString();
    project.category = itemData[0][projectnr]["categorie"].ToString();
    project.info = itemData[0][projectnr]["uitleg"].ToString();
    project.photoname = itemData[0][projectnr]["fotonaam"].ToString();
    project.endDate = itemData[0][projectnr]["einddatum"].ToString();
    project.price = itemData[0][projectnr]["kostprijs"].ToString();
    project.phase = itemData[0][projectnr]["fase"].ToString();
    project.likes = itemData[0][projectnr]["likes"].ToString();
    project.dislikes = null; // itemData[0][projectnr]["dislikes"].ToString();
    project.views = itemData[0][projectnr]["aantal_bekeken"].ToString();
    project.created_at = null; // itemData[0][projectnr]["created_at"].ToString();
    project.updated_at = null; // itemData[0][projectnr]["updated_at"].ToString();
    project.question = null;

    //projectList.Add(project);

    //PrintAllProjectInfo(project);

    /*for (int i = 0; i < totalProjects; i++)
    {
      projectIds[i] = itemData[0][i]["id"].ToString(); //alle projectsIDs in een array zetten


      Debug.Log(projectIds[i]);


      Debug.Log(itemData[0][i]["id"]);
      Debug.Log(itemData[0][i]["titel"]);
      Debug.Log(itemData[0][i]["uitleg"]);
      Debug.Log(itemData[0][i]["fotonaam"]);
      Debug.Log(itemData[0][i]["likes"]);*/
  }
}

public class Project
{
  public string id { get; set; }
  public string title { get; set; }
  public string category { get; set; }
  public string info { get; set; }
  public string photoname { get; set; }
  public string endDate { get; set; }
  public string price { get; set; }
  public string phase { get; set; }
  public string likes { get; set; }
  public string dislikes { get; set; }
  public string views { get; set; }
  public string created_at { get; set; }
  public string updated_at { get; set; }
  public string question { get; set; }
}
    
