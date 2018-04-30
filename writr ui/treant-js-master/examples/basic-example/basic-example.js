var config = {
        container: "#basic-example",
        
        connectors: {
            type: "step"
        },
        node: {
            HTMLclass: "nodeExample1"
        }
    },
    node_5 = {
        text: {
            name: "5",
            title: "root node ",
            contact: "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!",
        },
    },
    node_1 = {
        parent: node_5,
        text: {
            name: "1",
            title: "5",
            contact: "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!",
        },
    },
    node_2 = {
        parent: node_5,
        text: {
            name: "2",
            title: "5",
            contact: "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!",
        },
    },
    node_4 = {
        parent: node_2,
        text: {
            name: "4",
            title: "2",
            contact: "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!",
        },
    },
    chart_config = [
		config,
		node_5,
    	node_1,
    	node_2,
    	node_4,
    
	    ];