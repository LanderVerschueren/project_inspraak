using UnityEngine;
using System.Collections;
using System.IO;
using LitJson;
using System.Collections.Generic;
using System.ComponentModel;

public class LoadProjectSettings : MonoBehaviour {
  public static int totalProjects;
  public static int currentprojectNr;

  public GameObject originalProject;
  public GameObject projectCollection;
  public RectTransform originelRectTrans;

  public GameObject content;

  private int projectsCreated;
  private string jsonString;
  private JsonData itemData;

  public static List<Project> projectList;
  //public string[] projectIds;
  //public string[] projectTitles;
  

	// Use this for initialization
	IEnumerator Start () {
    string url = "http://bananas.multimediatechnology.be/api/projects";

    WWW www = new WWW(url);
    yield return www;
    Debug.Log(url);
    if (www.error == null)
    {
      itemData = JsonMapper.ToObject(www.text);
    }
    else
    {
      Debug.Log("ERROR: " + www.error);
    }
    //itemData = JsonMapper.ToObject(jsonString);

    /*jsonString = File.ReadAllText(Application.dataPath + "/Resources/bananas2.json");
    itemData = JsonMapper.ToObject(jsonString);*/

    projectsCreated = 0;
    Debug.Log(itemData.Count);
    totalProjects = itemData[0].Count; //tel totaal aantal projecten
    Debug.Log("totalprojects = " + totalProjects);

    projectList = new List<Project>();

    //projectIds = new string[totalProjects];
    //projectTitles = new string[totalProjects];

    LoadAllProjects();

    //Debug.Log(projectList[0].projectID);
    UpdateContent();
    /*Debug.Log(jsonString);
    Debug.Log(itemData[0][0]["titel"]);
    Debug.Log("total projects =" + itemData.Count);*/

    createProjectPanel();

	}
	
	// Update is called once per frame
	void Update () {
	
	}

  void PrintAllProjectInfo(Project projectToPrint) //print alle info van 1 project (projectToPrint)
  {
    foreach (PropertyDescriptor descriptor in TypeDescriptor.GetProperties(projectToPrint))
    {
      string name = descriptor.Name;
      object value = descriptor.GetValue(projectToPrint);
      Debug.Log("Projectnr " + projectToPrint.id + name + " = " + value);
    }
  }

  public Project LoadJsonData(int projectnr) //alle data voor 1 project laden uit JSON
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
    project.dislikes = itemData[0][projectnr]["dislikes"].ToString();
    project.views = itemData[0][projectnr]["aantal_bekeken"].ToString();
    project.created_at = null; // itemData[0][projectnr]["created_at"].ToString();
    project.updated_at = null; // itemData[0][projectnr]["updated_at"].ToString();
    project.question = itemData[0][projectnr]["vraag"].ToString();

    projectList.Add(project);

    Debug.Log(projectList);

    return project;
    

  }
    //projectList.Add(project);

    

    /*for (int i = 0; i < totalProjects; i++)
    {
      projectIds[i] = itemData[0][i]["id"].ToString(); //alle projectsIDs in een array zetten


      Debug.Log(projectIds[i]);


      Debug.Log(itemData[0][i]["id"]);
      Debug.Log(itemData[0][i]["titel"]);
      Debug.Log(itemData[0][i]["uitleg"]);
      Debug.Log(itemData[0][i]["fotonaam"]);
      Debug.Log(itemData[0][i]["likes"]);*/

  void UpdateContent() //stelt grootte van content panel in
  {
    /*foreach (Project project in projectList)
    {*/
    for (int i = 0; i < totalProjects; i++)
    {
      //Debug.Log("loop");
      content.GetComponent<RectTransform>().offsetMax = new Vector2(content.GetComponent<RectTransform>().offsetMax.x + 533.325f, (content.GetComponent<RectTransform>().offsetMax.y));
    }
    //}
  }

  void LoadAllProjects() //alle projectdata laden vanuit JSON
  {
    for (int i = 0; i < totalProjects; i++)
    {
      LoadJsonData(i);
      Debug.Log("PROJECTLOADED");
    }
  }

  void createProjectPanel()
  {
    for (int i = 0; i < totalProjects; i++)
    {
      GameObject newProject = GameObject.Instantiate(originalProject) as GameObject;
      newProject.name = "Project" + projectsCreated;

      newProject.GetComponent<RectTransform>().SetParent(projectCollection.transform);
      newProject.GetComponent<RectTransform>().localScale = new Vector3(1f, 1f, 1f);
      newProject.GetComponent<RectTransform>().sizeDelta = new Vector2(originelRectTrans.rect.width, originelRectTrans.rect.height);    // origin.rect.width, oldReactionRect.rect.height);
      newProject.GetComponent<RectTransform>().offsetMin = new Vector2(originelRectTrans.offsetMin.x, 0);
      newProject.GetComponent<RectTransform>().offsetMax = new Vector2(originelRectTrans.offsetMax.x, 0);
      newProject.GetComponent<RectTransform>().localPosition = new Vector2(0 + 800 * (projectsCreated), 0);

      newProject.SetActive(true);

      projectsCreated++;
    }
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


    
