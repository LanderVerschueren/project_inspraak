using UnityEngine;
using System.Collections;
using UnityEngine.UI;

public class GetCanvasSize : MonoBehaviour {
  public static int nrOfProjects = 3;

  public RectTransform pnl_AllProjects;
  public RectTransform canvasRect;
  public RectTransform pnl_Content;

  public static float canvasHeight;
  public static float canvasWidth;
	// Use this for initialization
	void Start () {

    canvasWidth = canvasRect.rect.width;
    canvasHeight = canvasRect.rect.height;

    Debug.Log("Start");

    setPanelSize();
    
	}

  public void setPanelSize()
  {
    pnl_Content.sizeDelta = new Vector2((canvasWidth * nrOfProjects), canvasHeight);
    pnl_AllProjects.sizeDelta = new Vector2((canvasWidth * nrOfProjects), canvasHeight);
    Debug.Log(nrOfProjects);
    Debug.Log("width =" + canvasWidth);
    Debug.Log("width pnl_content =" + pnl_Content.rect.width);
  }

	// Update is called once per frame
	void Update () {
	
	}
}
